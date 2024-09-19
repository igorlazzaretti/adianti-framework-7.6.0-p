<?php
class EmbeddedPDFView extends TPage
{
    public function __construct()
    {
        parent::__construct();

        $object = new TElement ('iframe');
        $object->width  = '99%';
        $object->height = '1200px';
        $object->src    = 'http://educa.alfenas.mg.gov.br/content/pdf/biblioteca/harry-potter-e-a-camara-secreta.pdf'; 
        $object->type   = 'application/pdf'; 
        parent::add($object);
    }
}