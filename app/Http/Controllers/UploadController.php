<?php
namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\BlogRequestController;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;
use UploadImage;
use Dan\UploadImage\Exceptions\UploadImageException;
/**
 * Class UploadController
 * @package App\Http\Controllers
 */
class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Upload and save image.
        $file = $request->file('image');
        // Upload and save image.
        try {
            // Upload and save image.
            $input['image'] = UploadImage::upload($file, 'post')->getImageName();
        } catch (UploadImageException $e) {

            return back()->withInput()->withErrors(['image', $e->getMessage()]);
        }
    }
}