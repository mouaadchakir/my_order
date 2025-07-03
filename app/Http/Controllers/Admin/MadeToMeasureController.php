<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MadeToMeasureRequest;
use App\Mail\RequestStatusUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Exception;

class MadeToMeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = MadeToMeasureRequest::latest()->paginate(10);
        return view('admin.made-to-measure.index', compact('requests'));
    }

    /**
     * Update the status of the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        Log::info('Entering updateStatus method.'); // Log entry

        $request->validate([
            'status' => 'required|string|in:New,In Progress,Completed,Cancelled',
        ]);

        $madeToMeasureRequest = MadeToMeasureRequest::findOrFail($id);
        $madeToMeasureRequest->update(['status' => $request->status]);

        try {
            Log::info('Attempting to send status update email to: ' . $madeToMeasureRequest->email); // Log before sending
            Mail::to($madeToMeasureRequest->email)->send(new RequestStatusUpdated($madeToMeasureRequest));
            Log::info('Email sent successfully.'); // Log after sending
        } catch (Exception $e) {
            Log::error('Failed to send email. Error: ' . $e->getMessage()); // Log any error
        }

        return redirect()->route('admin.requests.index')
                         ->with('success', 'Request status updated successfully!');
    }
}