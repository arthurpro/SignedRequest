<?php
namespace Graze\SignedRequest;

class SignTest extends \PHPUnit_Framework_TestCase
{
    public function testSignWithNoParameters()
    {
        $expected = array('signature' => 'e2ac5880d45b3f85e956864123069ba75fe6746f');
        $this->assertSame($expected, sign('foo', array()));
    }

    public function testSignWithSingleParameter()
    {
        $params = array('bar' => 'baz');
        $expected = $params + array('signature' => '293e3a8f2e74737209e62cfd85c332ea31a43933');
        $this->assertSame($expected, sign('foo', $params));
    }

    public function testSignWithMultipleParameters()
    {
        $params = array(
            'bar' => 'baz',
            'bam' => 'bat',
            'bap' => array(1, 2, 3, 'a', 'b', 'c')
        );
        $expected = $params + array('signature' => '08282e210395087ddefe60b84f4fd57b846daec4');
        ksort($expected);
        $this->assertSame($expected, sign('foo', $params));
    }

    public function testSignWithSpecialCharacters()
    {
        $params = array('bar' => 'baz/bam:bat@bap');
        $expected = $params + array('signature' => '29c205c78867e2dfa1c3960102d17197a36f1db9');
        $this->assertSame($expected, sign('foo', $params));
    }
}
