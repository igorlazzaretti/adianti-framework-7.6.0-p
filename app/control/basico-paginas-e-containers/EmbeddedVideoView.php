<?php
class EmbeddedVideoView extends TPage
{
    public function __construct()
    {
        parent::__construct();

        $iframe = new TElement ('iframe');
        $iframe->width  = '99%';
        $iframe->height = '570px';
        $iframe->src    = 'https://www.youtube.com/embed/_gesFCTTmQ0?si=PBc66Q5Fojw9cRbY    '; 
        $iframe->frameborder = '0';
        $iframe->type   = 'application/video'; 
        $iframe->allowfullscreen = 'true';  
        $iframe->allow = 'autoplay; encrypted-media; fullscreen; picture-in-picture; web-share; gyroscope; accelerometer';
        parent::add($iframe);
    }
}