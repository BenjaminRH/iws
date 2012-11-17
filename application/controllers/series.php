<?php

class Series_Controller extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->filter('before', 'auth')->except(array('index, show'));
    }

    public function get_index()
    {
        // PAGE - List of series
        $series = Series::order_by('name', 'asc')->get();

        return View::make('series.index')->with('series', $series);
    }

    public function get_show($series_slug)
    {
        // PAGE - Show a single series
        $series = Series::find_by_slug($series_slug);

        if(!$series) {
            return Response::error('404');
        }

        return View::make('series.show')->with('series', $series);
    }

    public function get_add()
    {
        // PAGE - Add a new series
        return View::make('series.new');
    }

    public function series_add()
    {
        // HANDLE - Add a new series
        $input = Input::only(Series::$accessible);
        Input::flash();
        $validation = Validator::make($input, Series::$validation_rules);

        if($validation->fails()) {
            return Redirect::back()->with_input()->with_errors($validation);
        }

        // Add series to database
        $series = Series::create_series($input);

        return Redirect::to('series.index')->with('status', 'Series '.$series->title.' has been saved!');
    }

    public function get_edit($series_slug)
    {
        // PAGE - Edit an existing series
        $series = Series::find_by_slug($series_slug);

        if(!$series) {
            return Response::error('404');
        }

        return View::make('series.edit')->with('series', $series);
    }

    public function series_edit($series_slug)
    {
        // HANDLE - Edit an existing series
        $series = Series::find_by_slug($series_slug);
        $input = Input::only(Series::$accessible);
        Input::flash();
        $validation = Validator::make($input, Series::$validation_rules);

        if($validation->fails()) {
            return Redirect::back()->with_input()->with_errors($validation)->with('series', $series);
        }

        // Update series database entry
        $series->update_series($input);

        return Redirect::to('series.index')->with('status', 'Your changes to series '.$series->title.' have been saved!');
    }

    public function get_delete($series_slug)
    {
        // PAGE - Confirm series deletion
        $series = Series::find_by_slug($series_slug);

        if(!$series) {
            return Response::error('404');
        }

        return View::make('series.delete')->with('series', $series);
    }

    public function series_delete($series_slug)
    {
        // HANDLE - Delete the series if deletion is confirmed
        $input = Input::only(array('delete-confirm'));
        $rules = array('delete-confirm' => 'accepted');
        $validation = Validator::make($input, $rules);
        $series = Series::find_by_slug($series_slug);

        if($validation->fails()) {
            return Redirect::back()->with_errors($validation)->with('series', $series);
        }
        
        // Now delete the series
        $series_title = $series->title;
        $series->delete();
        return Redirect::to('series.index')->with('status', 'Series '.$series_title.' has been deleted.');
    }
}