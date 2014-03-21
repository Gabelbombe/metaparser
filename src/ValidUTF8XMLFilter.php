<?php
stream_filter_register('xmlutf8', 'ValidUTF8XMLFilter');

Class ValidUTF8XMLFilter Extends php_user_filter
{
    protected static $pattern = '/[^\x{0009}\x{000a}\x{000d}\x{0020}-\x{D7FF}\x{E000}-\x{FFFD}]+/u';

    public function filter($in, $out, &$consumed, $closing)
    {
        while ($bucket = stream_bucket_make_writeable($in))
        {
            $bucket->data = preg_replace(self::$pattern, '', $bucket->data);
            $consumed += $bucket->datalen;
            stream_bucket_append($out, $bucket);
        }
        return PSFS_PASS_ON;
    }
}