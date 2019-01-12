<?php

namespace Scheb\TwoFactorBundle\Tests\Security\TwoFactor;

use Scheb\TwoFactorBundle\Security\TwoFactor\TwoFactorFirewallConfig;
use Scheb\TwoFactorBundle\Tests\TestCase;

class TwoFactorFirewallConfigTest extends TestCase
{
    private const FULL_OPTIONS = [
        'multi_factor' => true,
        'auth_code_parameter_name' => 'auth_code_param',
        'trusted_parameter_name' => 'trusted_param',
        'csrf_parameter' => 'parameter_name',
        'csrf_token_id' => 'token_id',
        'csrf_token_generator' => 'csrf_token_generator',
    ];

    private function createConfig($options = self::FULL_OPTIONS): TwoFactorFirewallConfig
    {
        return new TwoFactorFirewallConfig($options);
    }

    /**
     * @test
     */
    public function isMultiFactor_optionSet_returnThatValue()
    {
        $returnValue = $this->createConfig()->isMultiFactor();
        $this->assertTrue($returnValue);
    }

    /**
     * @test
     */
    public function getAuthCodeParameterName_optionSet_returnThatValue()
    {
        $returnValue = $this->createConfig()->getAuthCodeParameterName();
        $this->assertEquals('auth_code_param', $returnValue);
    }

    /**
     * @test
     */
    public function getTrustedParameterName_optionSet_returnThatValue()
    {
        $returnValue = $this->createConfig()->getTrustedParameterName();
        $this->assertEquals('trusted_param', $returnValue);
    }

    /**
     * @test
     */
    public function getCsrfParameterName_optionSet_returnThatValue()
    {
        $returnValue = $this->createConfig()->getCsrfParameterName();
        $this->assertEquals('parameter_name', $returnValue);
    }

    /**
     * @test
     */
    public function getCsrfTokenId_optionSet_returnThatValue()
    {
        $returnValue = $this->createConfig()->getCsrfTokenId();
        $this->assertEquals('token_id', $returnValue);
    }

    /**
     * @test
     */
    public function isCsrfProtectionEnabled_configuredCsrfTokenGeneratorIsNull_returnFalse()
    {
        $returnValue = $this->createConfig([])->isCsrfProtectionEnabled();
        $this->assertFalse($returnValue);
    }

    /**
     * @test
     */
    public function isCsrfProtectionEnabled_configuredCsrfTokenGeneratorIsString_returnTrue()
    {
        $returnValue = $this->createConfig(self::FULL_OPTIONS)->isCsrfProtectionEnabled();
        $this->assertTrue($returnValue);
    }
}
