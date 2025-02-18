<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Retrieve video information by ID.
     *
     * @param int $id The video ID.
     * @return \Illuminate\Http\JsonResponse
     */
    public function videoInfo($id)
    {
        $video = Video::find($id);
        return response()->json($video);
    }
    
    public function index(){
        return video::orderby('id')->get();
    }
}
