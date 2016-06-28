<?php
namespace LaraLibs\Modular\Commands;

trait NamespaceConverterTrait
{
    /**
     * Transform string into a single namespace
     *
     * @param  string $str
     * @return string
     */
    public function toNamespace($str = null)
    {
        // explode things by using slashes
        $recs = explode('/', $str);

        $recs = array_map(function($val) {
            // now convert it to match the namespaces
            return ucfirst(camel_case($val));
        }, $recs);

        return implode('\\', $recs);
    }
}
