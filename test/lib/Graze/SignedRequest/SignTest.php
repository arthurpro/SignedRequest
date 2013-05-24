<?php
namespace Graze\SignedRequest;

class SignTest extends \PHPUnit_Framework_TestCase
{
    public function testSignWithNoParameters()
    {
        $this->assertSame('e2ac5880d45b3f85e956864123069ba75fe6746f', sign('foo', array()));
    }

    public function testSignWithSingleParameter()
    {
        $this->assertSame('293e3a8f2e74737209e62cfd85c332ea31a43933', sign('foo', array('bar' => 'baz')));
    }

    public function testSignWithMultipleParameters()
    {
        $this->assertSame('08282e210395087ddefe60b84f4fd57b846daec4', sign('foo', array(
            'bar' => 'baz',
            'bam' => 'bat',
            'bap' => array(1, 2, 3, 'a', 'b', 'c')
        )));
    }

    public function testSignWithSpecialCharacters()
    {
        $this->assertSame('29c205c78867e2dfa1c3960102d17197a36f1db9', sign('foo', array('bar' => 'baz/bam:bat@bap')));
    }
}
