<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the advertisements.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::all();
        return response()->json($advertisements);
    }

    /**
     * Store a newly created advertisement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image_path' => 'nullable|string',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'position' => 'required|in:homepage,sidebar,footer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'boolean',
        ]);

        $advertisement = Advertisement::create($validated);

        return response()->json(['message' => 'Advertisement created successfully.', 'data' => $advertisement], 201);
    }

    /**
     * Display the specified advertisement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return response()->json($advertisement);
    }

    /**
     * Update the specified advertisement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image_path' => 'nullable|string',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'position' => 'nullable|in:homepage,sidebar,footer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'boolean',
        ]);

        $advertisement = Advertisement::findOrFail($id);
        $advertisement->update($validated);

        return response()->json(['message' => 'Advertisement updated successfully.', 'data' => $advertisement]);
    }

    /**
     * Remove the specified advertisement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();

        return response()->json(['message' => 'Advertisement deleted successfully.']);
    }
}
