<?php
namespace Graze\SignedRequest;

class ValidateTest extends \PHPUnit_Framework_TestCase
{
    public function testValidateWithNoParametersAndValidHash()
    {
        $this->assertTrue(validate('foo', array('signature' => 'e2ac5880d45b3f85e956864123069ba75fe6746f')));
    }

    public function testValidateWithNoParametersAndInvalidHash()
    {
        $this->assertFalse(validate('foo', array('signature' => 'derp5880d45b3f85e956864123069ba75fe6746f')));
    }

    public function testValidateWithSingleParameterAndValidHash()
    {
        $this->assertTrue(validate('foo', array(
            'bar' => 'baz',
            'signature' => '293e3a8f2e74737209e62cfd85c332ea31a43933'
        )));
    }

    public function testValidateWithSingleParameterAndInvalidHash()
    {
        $this->assertFalse(validate('foo', array(
            'bar' => 'baz',
            'signature' => 'derp3a8f2e74737209e62cfd85c332ea31a43933'
        )));
    }

    public function testValidateWithMultipleParametersAndValidHash()
    {
        $this->assertTrue(validate('foo', array(
            'bar' => 'baz',
            'bam' => 'bat',
            'bap' => array(1, 2, 3, 'a', 'b', 'c'),
            'signature' => '08282e210395087ddefe60b84f4fd57b846daec4'
        )));
    }

    public function testValidateWithMultipleParametersAndInvalidHash()
    {
        $this->assertFalse(validate('foo', array(
            'bar' => 'baz',
            'bam' => 'bat',
            'bap' => array(1, 2, 3, 'a', 'b', 'c'),
            'signature' => 'derp2e210395087ddefe60b84f4fd57b846daec4'
        )));
    }

    public function testValidateWithSpecialCharactersAndValidHash()
    {
        $this->assertTrue(validate('foo', array(
            'bar' => 'baz/bam:bat@bap',
            'signature' => '29c205c78867e2dfa1c3960102d17197a36f1db9'
        )));
    }

    public function testValidateWithSpecialCharactersAndInvalidHash()
    {
        $this->assertFalse(validate('foo', array(
            'bar' => 'baz/bam:bat@bap',
            'signature' => 'derp05c78867e2dfa1c3960102d17197a36f1db9'
        )));
    }

    public function testValidateWithAlternativelyNamedKeyAndValidHash()
    {
        $this->assertTrue(validate('foo', array('hash' => 'e2ac5880d45b3f85e956864123069ba75fe6746f'), 'hash'));
    }

    public function testValidateWithAlternativelyNamedKeyAndInvalidHash()
    {
        $this->assertFalse(validate('foo', array('hash' => 'derp5880d45b3f85e956864123069ba75fe6746f'), 'hash'));
    }

    public function testValidateWithMissingHash()
    {
        $this->setExpectedException('OutOfRangeException');
        $this->assertFalse(validate('foo', array()));
    }
}
