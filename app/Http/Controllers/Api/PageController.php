<?php

namespace App\Http\Controllers\Api;

use App\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

/**
 * Class PageController
 * Handles CRUD for public pages
 *
 * @package App\Http\Controllers\Api
 */

class PageController extends Controller
{
    /**
     * Display a listing of pages.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Page::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        // No create page form is provided from this controller
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        //
        $data = $request->all();
        if (!isset($data['text'])) {
            $data['text'] = '';
        }
        $page = Page::create($data);
        return response()->json($page);
    }

    /**
     * Returns the specified page data.
     *
     * @param  \App\Page  $page
     * @return JsonResponse
     */
    public function show(Page $page): JsonResponse
    {
        return response()->json($page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     */
    public function edit(Page $page)
    {
        // No edit page form is specified for current controller
    }

    /**
     * Update the specified page in storage.
     *
     * @param  Request  $request
     * @param  Page  $page
     * @return JsonResponse
     */
    public function update(Request $request, Page $page): JsonResponse
    {
        //
        $data = $request->all();
        $page->fill($data);
        $page->save();
        return response()->json($page);
    }

    /**
     * @param Page $page
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Page $page): JsonResponse
    {
        try {
            $page->delete();
        } catch (\Exception $e) {

        }
        return response()->json(['success' => true]);
    }
}
