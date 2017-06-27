<?php

namespace UserOverrideBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UserOverrideBundle extends Bundle
{
    public function getParent()
    {
        return 'HWIOAuthBundle';
    }
}
