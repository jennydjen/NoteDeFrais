<?php

namespace Jenny\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class JennyUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
