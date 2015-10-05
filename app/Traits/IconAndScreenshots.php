<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Showcase;
use App\Traits\ImageUpload;

/**
 * Showcase screenshots and icon image trait.
 *
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

trait IconAndScreenshots
{
	use ImageUpload;

	/**
     * Icon image upload view.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function icon($id)
    {
        $route = 'showcase.postIcon';

        $showcase = Showcase::findOrFail($id);

        $prop['max_files'] = 1;
        $prop['type'] = 'icon';

        return view('showcase.dashboard.dropzone', compact('id', 'route', 'showcase', 'prop'));
    }

    /**
     * Icon image upload process.
     *
     * @param \Illuminate\Http\Request $request
     * @param  string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function postIcon(Request $request, $id)
    {
        $model = Showcase::findOrFail($id);

        $upload = $this->imageUpload($request);

        if ( $upload) {

            // Remove old icon image
            if ( $model->icon) {
                $this->deleteImage($model->icon);
            }

            $model->icon = implode('/', $upload);

            if ($model->save()) {
                return response()->json($model->icon, 200);
            }
        }

        return response()->json('error', 400);
    }

    /**
     * Screenshot images upload view.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function screenshots($id)
    {
        $route = 'showcase.postScreenshots';

        $showcase = Showcase::findOrFail($id);

        $prop['max_files'] = 25;
        $prop['type'] = 'screenshots';

        return view('showcase.dashboard.dropzone', compact('id', 'route', 'showcase', 'prop'));
    }

     /**
     * Screenshot images upload process.
     *
     * @param \Illuminate\Http\Request $request
     * @param  string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function postScreenshots(Request $request, $id)
    {
        $model = Showcase::findOrFail($id);

        $upload = $this->imageUpload($request);

        if ( $upload) {
            $image = implode('/', $upload);

            if ($model->push('screenshots', $image)) {
                return response()->json($image, 200);
            }
        }

        return response()->json('error', 400);
    }

    /**
     * Remove the screenshot image.
     *
     * @param \Illuminate\Http\Request $request
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function screenshotsRemove(Request $request, $id)
    {
        $showcase = Showcase::findOrFail($id);

        $file = $request->get('s');

        foreach ($showcase->screenshots as $s) {
            if ( $s == $file) {
                if ($showcase->pull('screenshots', $s)) {
                    $this->deleteImage($s);
                }
            }
        }

        return back();
    }
}