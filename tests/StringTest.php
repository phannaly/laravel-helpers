<?php

class StringTest extends \PHPUnit\Framework\TestCase
{
    public function testCamelCase()
    {
        $this->assertEquals('fooBar', camel_case('FooBar'));
        $this->assertEquals('fooBar', camel_case('foo_bar'));
        $this->assertEquals('fooBar', camel_case('foo_bar')); // test cache
        $this->assertEquals('fooBarBaz', camel_case('Foo-barBaz'));
        $this->assertEquals('fooBarBaz', camel_case('foo-bar_baz'));
    }

    public function testEndsWith()
    {
        $this->assertTrue(ends_with('jason', 'on'));
        $this->assertTrue(ends_with('jason', ['on']));
        $this->assertFalse(ends_with('jason', 'no'));
        $this->assertFalse(ends_with('jason', ['no']));
    }

    public function testKebabCase()
    {
        $this->assertEquals('laravel-php-framework', kebab_case('LaravelPhpFramework'));
    }

    public function testSnakeCase()
    {
        $this->assertEquals('foo_bar', snake_case('fooBar'));
        $this->assertEquals('foo_bar', snake_case('fooBar')); // test cache
    }

    public function testStartsWith()
    {
        $this->assertTrue(starts_with('jason', 'jas'));
        $this->assertTrue(starts_with('jason', ['jas']));
        $this->assertFalse(starts_with('jason', 'day'));
        $this->assertFalse(starts_with('jason', ['day']));
    }

    public function testStrAfter()
    {
        $this->assertEquals('nah', str_after('hannah', 'han'));
        $this->assertEquals('nah', str_after('hannah', 'n'));
        $this->assertEquals('hannah', str_after('hannah', 'xxxx'));
    }

    public function testStrBefore()
    {
        $this->assertEquals('han', str_before('hannah', 'nah'));
        $this->assertEquals('ha', str_before('hannah', 'n'));
        $this->assertEquals('ééé ', str_before('ééé hannah', 'han'));
        $this->assertEquals('hannah', str_before('hannah', 'xxxx'));
        $this->assertEquals('hannah', str_before('hannah', ''));
        $this->assertEquals('han', str_before('han0nah', '0'));
        $this->assertEquals('han', str_before('han0nah', 0));
        $this->assertEquals('han', str_before('han2nah', 2));
    }

    public function testStrContains()
    {
        $this->assertTrue(str_contains('taylor', 'ylo'));
        $this->assertTrue(str_contains('taylor', ['ylo']));
        $this->assertFalse(str_contains('taylor', 'xxx'));
        $this->assertFalse(str_contains('taylor', ['xxx']));
        $this->assertTrue(str_contains('taylor', ['xxx', 'taylor']));
    }

    public function testStrFinish()
    {
        $this->assertEquals('test/string/', str_finish('test/string', '/'));
        $this->assertEquals('test/string/', str_finish('test/string/', '/'));
        $this->assertEquals('test/string/', str_finish('test/string//', '/'));
    }

    public function testStrIs()
    {
        $this->assertTrue(str_is('*.dev', 'localhost.dev'));
        $this->assertTrue(str_is('a', 'a'));
        $this->assertTrue(str_is('/', '/'));
        $this->assertTrue(str_is('*dev*', 'localhost.dev'));
        $this->assertTrue(str_is('foo?bar', 'foo?bar'));
        $this->assertFalse(str_is('*something', 'foobar'));
        $this->assertFalse(str_is('foo', 'bar'));
        $this->assertFalse(str_is('foo.*', 'foobar'));
        $this->assertFalse(str_is('foo.ar', 'foobar'));
        $this->assertFalse(str_is('foo?bar', 'foobar'));
        $this->assertFalse(str_is('foo?bar', 'fobar'));

        $this->assertTrue(str_is([
            '*.dev',
            '*oc*',
        ], 'localhost.dev'));

        $this->assertFalse(str_is([
            '/',
            'a*',
        ], 'localhost.dev'));

        $this->assertFalse(str_is([], 'localhost.dev'));
    }

    public function testStrLimit()
    {
        $string = 'The PHP framework for web artisans.';
        $this->assertEquals('The PHP...', str_limit($string, 7));
        $this->assertEquals('The PHP', str_limit($string, 7, ''));
        $this->assertEquals('The PHP framework for web artisans.', str_limit($string, 100));

        $nonAsciiString = '这是一段中文';
        $this->assertEquals('这是一...', str_limit($nonAsciiString, 6));
        $this->assertEquals('这是一', str_limit($nonAsciiString, 6, ''));
    }

    public function testStrRandom()
    {
        $result = str_random(20);
        $this->assertInternalType('string', $result);
        $this->assertEquals(20, strlen($result));
    }

    public function testStrReplaceArray()
    {
        $this->assertEquals('foo/bar/baz', str_replace_array('?', ['foo', 'bar', 'baz'], '?/?/?'));
        $this->assertEquals('foo/bar/baz/?', str_replace_array('?', ['foo', 'bar', 'baz'], '?/?/?/?'));
        $this->assertEquals('foo/bar', str_replace_array('?', ['foo', 'bar', 'baz'], '?/?'));
        $this->assertEquals('?/?/?', str_replace_array('x', ['foo', 'bar', 'baz'], '?/?/?'));
    }

    public function testStrReplaceFirst()
    {
        $this->assertEquals('fooqux foobar', str_replace_first('bar', 'qux', 'foobar foobar'));
        $this->assertEquals('foo/qux? foo/bar?', str_replace_first('bar?', 'qux?', 'foo/bar? foo/bar?'));
        $this->assertEquals('foo foobar', str_replace_first('bar', '', 'foobar foobar'));
        $this->assertEquals('foobar foobar', str_replace_first('xxx', 'yyy', 'foobar foobar'));
        $this->assertEquals('foobar foobar', str_replace_first('', 'yyy', 'foobar foobar'));
        // Test for multibyte string support
        $this->assertEquals('Jxxxnköping Malmö', str_replace_first('ö', 'xxx', 'Jönköping Malmö'));
        $this->assertEquals('Jönköping Malmö', str_replace_first('', 'yyy', 'Jönköping Malmö'));
    }

    public function testStrReplaceLast()
    {
        $this->assertEquals('foobar fooqux', str_replace_last('bar', 'qux', 'foobar foobar'));
        $this->assertEquals('foo/bar? foo/qux?', str_replace_last('bar?', 'qux?', 'foo/bar? foo/bar?'));
        $this->assertEquals('foobar foo', str_replace_last('bar', '', 'foobar foobar'));
        $this->assertEquals('foobar foobar', str_replace_last('xxx', 'yyy', 'foobar foobar'));
        $this->assertEquals('foobar foobar', str_replace_last('', 'yyy', 'foobar foobar'));
        // Test for multibyte string support
        $this->assertEquals('Malmö Jönkxxxping', str_replace_last('ö', 'xxx', 'Malmö Jönköping'));
        $this->assertEquals('Malmö Jönköping', str_replace_last('', 'yyy', 'Malmö Jönköping'));
    }

    public function testStrSlug()
    {
        $this->assertEquals('hello-world', str_slug('hello world'));
        $this->assertEquals('hello-world', str_slug('hello-world'));
        $this->assertEquals('hello-world', str_slug('hello_world'));
        $this->assertEquals('hello_world', str_slug('hello_world', '_'));
        $this->assertEquals('user-at-host', str_slug('user@host'));
    }

    public function testStrStart()
    {
        $this->assertEquals('/test/string', str_start('test/string', '/'));
        $this->assertEquals('/test/string', str_start('/test/string', '/'));
        $this->assertEquals('/test/string', str_start('//test/string', '/'));
    }

    public function testStudlyCase()
    {
        $this->assertEquals('FooBar', studly_case('fooBar'));
        $this->assertEquals('FooBar', studly_case('foo_bar'));
        $this->assertEquals('FooBar', studly_case('foo_bar')); // test cache
        $this->assertEquals('FooBarBaz', studly_case('foo-barBaz'));
        $this->assertEquals('FooBarBaz', studly_case('foo-bar_baz'));
    }

    public function testTitleCase()
    {
        $this->assertEquals('Jefferson Costella', title_case('jefferson costella'));
        $this->assertEquals('Jefferson Costella', title_case('jefFErson coSTella'));
    }
}
