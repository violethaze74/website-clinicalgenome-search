<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\GeneLib;
use App\Filter;

/**
*
* @category   Web
* @package    Search
* @author     P. Weller <pweller1@geisinger.edu>
* @author     S. Goehringer <scottg@creationproject.com>
* @copyright  2019 ClinGen
* @license    http://www.php.net/license/3_01.txt  PHP License 3.01
* @version    Release: @package_version@
* @link       http://pear.php.net/package/PackageName
* @see        NetOther, Net_Sample::Net_Sample()
* @since      Class available since Release 1.2.0
* @deprecated
*
* */
class DrugController extends Controller
{
	private $user = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::guard('api')->check())
                $this->user = Auth::guard('api')->user();
            return $next($request);
        });
    }


	/**
	* Display a listing of drugs.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index(Request $request, $page = 0, $size = 50, $search="")
    {
		// process request args
		foreach ($request->only(['page', 'size', 'order', 'sort', 'search']) as $key => $value)
			$$key = $value;

        // set display context for view
        $display_tabs = collect([
            'active' => "drug",
            'title' => "Drugs",
            'scrid' => Filter::SCREEN_ALL_DRUGS,
			'display' => "All Drugs"
        ]);

        // get list of all current bookmarks for the page
        $bookmarks = ($this->user === null ? collect() : $this->user->filters()->screen(Filter::SCREEN_ALL_DRUGS)->get()->sortBy('name', SORT_STRING | SORT_FLAG_CASE));

        // get active bookmark, if any
        $filter = Filter::preferences($request, $this->user, Filter::SCREEN_ALL_DRUGS);

        if ($filter !== null && getType($filter) == "object" && get_class($filter) == "Illuminate\Http\RedirectResponse")
            return $filter;

        // don't apply global settings if local ones present
        $settings = Filter::parseSettings($request->fullUrl());

        if (empty($settings['size']))
            $display_list = ($this->user === null ? 25 : $this->user->preferences['display_list'] ?? 25);
        else
            $display_list = $settings['size'];

		return view('drug.index', compact('display_tabs'))
						->with('apiurl', '/api/drugs')
						->with('pagesize', $size)
						->with('page', $page)
						->with('search', $search)
						->with('user', $this->user)
						->with('display_list', $display_list)
						->with('bookmarks', $bookmarks)
                        ->with('currentbookmark', $filter);
    }


    /**
     * Display a specified drug.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function show(Request $request, $id = null)
    {
		if ($id === null)
			return view('error.message-standard')
				->with('title', 'Error retrieving Drug details')
				->with('message', 'The system was not able to retrieve details for this Drug. Please return to the previous page and try again.')
				->with('back', url()->previous())
				->with('user', $this->user);

		if (strpos($id, "RXNORM:") === 0)
			$id = substr($id, 7);

		$record = GeneLib::drugDetail([ 'drug' => $id ]);

		if ($record === null)
			return view('error.message-standard')
						->with('title', 'Error retrieving Drug details')
						->with('message', 'The system was not able to retrieve details for this Drug.  Error message was: ' . GeneLib::getError() . '. Please return to the previous page and try again.')
						->with('back', url()->previous())
                        ->with('user', $this->user);

		// set display context for view
		$display_tabs = collect([
			'active' => "drug",
			'title' => $record->label . " drug information"
		]);

        return view('drug.show', compact('display_tabs', 'record'))
		->with('user', $this->user);
	}


	/**
	* Display a listing of all genes.
	*
	* @return \Illuminate\Http\Response
	*/
	public function search(Request $request)
	{

		// process request args
		foreach ($request->only(['search']) as $key => $value)
			$$key = $value;

		// the way layouts is set up, everything is named search.  Drug is the third

		return redirect()->route('drug-index', ['page' => 1, 'size' => 50, 'search' => $search[2] ]);
	}
}
