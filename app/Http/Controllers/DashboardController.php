<?php

namespace App\Http\Controllers;

use App\Entry;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$entries = Entry::all();
    	// Show the admin dashboard (only logged in users can access it)
        return view('dashboard', compact('entries'));
    }

	public function downloadReceipts()
	{
		$files = glob(storage_path('app/receipts/*'));

		if ($files) {
			Zipper::make(public_path('downloads/receipts.zip'))->add($files)->close();
			return response()->download(public_path('downloads/receipts.zip'));
		} else {
			return redirect('dashboard')->with('status', 'No images found in the Receipts Directory!');
		}
	}
}
