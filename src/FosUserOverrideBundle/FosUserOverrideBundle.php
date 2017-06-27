<?php

namespace FosUserOverrideBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FosUserOverrideBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
