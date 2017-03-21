<?php

namespace Chaya3niUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class Chaya3niUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
