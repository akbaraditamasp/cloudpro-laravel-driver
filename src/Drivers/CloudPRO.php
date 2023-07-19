<?php

namespace CloudPROLaravel\Drivers;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Http\UploadedFile;

class CloudPRO implements Cloud
{

    protected array $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public function put($filename, $contents, $options = [])
    {
        return \CloudPRO\CloudPRO::begin()
            ->useBoxToken($this->options["pro_box_token"])
            ->storeFile($filename, $contents, $options, [
                "filename" => $filename
            ]);
    }

    public function move($from, $to)
    {
        \CloudPRO\CloudPRO::begin()->useBoxToken($this->options["pro_box_token"])->moveNode($from, $to);
    }

    public function makeDirectory($path)
    {
        \CloudPRO\CloudPRO::begin()->useBoxToken($this->options["pro_box_token"])->storeFolder($path, []);
    }

    public function readStream($path)
    {
        // TODO: Implement readStream() method.
    }

    public function prepend($path, $data)
    {
        // TODO: Implement prepend() method.
    }

    public function putFileAs($folder, $contents, $filename)
    {
        $stream = $contents instanceof UploadedFile ? fopen($contents->path(), "r") : $contents;

        return \CloudPRO\CloudPRO::begin()
            ->useBoxToken($this->options["pro_box_token"])
            ->storeFile($filename, $stream, [], [
                "filename" => $filename
            ]);
    }

    public function delete($paths)
    {
        if (is_array($paths)) {
            foreach ($paths as $path) {
                \CloudPRO\CloudPRO::begin()->useBoxToken($this->options["pro_box_token"])->deleteNode($path);
            }
        } else {
            \CloudPRO\CloudPRO::begin()->useBoxToken($this->options["pro_box_token"])->deleteNode($paths);
        }
    }

    public function url($path)
    {
        return (\CloudPRO\CloudPRO::begin()->useBoxToken($this->options["pro_box_token"])->showNode($path))["url"];
    }

    public function setVisibility($path, $visibility)
    {
        // TODO: Implement setVisibility() method.
    }

    public function writeStream($path, $resource, array $options = [])
    {
        // TODO: Implement writeStream() method.
    }

    public function size($path)
    {
        // TODO: Implement size() method.
    }

    public function allDirectories($directory = null)
    {
        // TODO: Implement allDirectories() method.
    }

    public function get($path)
    {
        // TODO: Implement get() method.
    }

    public function exists($path)
    {
        // TODO: Implement exists() method.
    }

    public function files($directory = null, $recursive = false)
    {
        // TODO: Implement files() method.
    }

    public function directories($directory = null, $recursive = false)
    {
        // TODO: Implement directories() method.
    }

    public function lastModified($path)
    {
        // TODO: Implement lastModified() method.
    }

    public function copy($from, $to)
    {
        \CloudPRO\CloudPRO::begin()->useBoxToken($this->options["pro_box_token"])->copyNode($from, $to);
    }

    public function allFiles($directory = null)
    {
        // TODO: Implement allFiles() method.
    }

    public function deleteDirectory($directory)
    {
        // TODO: Implement deleteDirectory() method.
    }

    public function append($path, $data)
    {
        // TODO: Implement append() method.
    }

    public function getVisibility($path)
    {
        // TODO: Implement getVisibility() method.
    }
}
