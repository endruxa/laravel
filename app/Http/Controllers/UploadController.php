<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

/**
 * Class UploadController
 * @package App\Http\Controllers
 */
class UploadController extends Controller
{
    public function index()
    {
        return view('upload.index');
    }

    /**
     * @param Request $request
     */
    public function loadFile(Request $request)
    {
        $allPath = [];
        if($request->hasFile('photo')){
            foreach($request->file('photo') as $file) {
                // $path = $file->store('multiple-images', $this->getName($file));
                $path = $file->storeAs('multiple-images', $this->getName($file), 'images');
                // $allPath[] = $path->getPathname();
                $allPath[] = \Storage::disk('images')->url($path);
            }
        }
        dd($allPath);
    }

    /**
     * @param $file
     * @return string
     */
    private function getName($file)
    {
        return sprintf(
            '%s_%s',
            time(),
            $file->getClientOriginalName()
        );
    }
}