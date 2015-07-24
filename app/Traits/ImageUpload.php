<?php

namespace App\Traits;

use File;
use Validator;
use Illuminate\Http\Exception\HttpResponseException;

/**
 * Trait for image uploading.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

trait ImageUpload
{
    
	/**
     * Image uploading process from ajax posting.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $name
     * @return mixed
     */
    protected function imageUpload($request, $name = 'file')
    {
        $image = $request->file($name);
     
        $validator = Validator::make([$name => $image], [$name => 'image']);

        if ($validator->fails()) {
            throw new HttpResponseException(
                response()->json($validator->errors()->first(), 422)
            );
        }

        $destinationPath = $this->getDestinationPath();

        $fileName = $image->getClientOriginalName();

        $newName = date('YmdHis') . $fileName;

        if ( $image->move($destinationPath, $newName)) {

            if ( method_exists($this, 'uploadSuccess')) {
                return $this->uploadSuccess($destinationPath, $newName);
            }

            return [$destinationPath, $newName];
        }

        return false;
    }

    /**
     * Get image upload folder path.
     *
     * @return string
     */
    protected function getDestinationPath()
    {
        return property_exists($this, 'destinationPath') ? $this->destinationPath : 'uploads';
    }

    protected function deleteImage($path)
    {
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
