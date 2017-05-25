<?php
/**
 * Created by PhpStorm.
 * User: romeo
 * Date: 24/05/17
 * Time: 14:17
 */

namespace AppBundle\Controller;
use PHPUnit\Framework\TestCase;

class TestProjetControllerTest extends TestCase
{
    public function testAjouter()
    {
        $TestProjetController = new TestProjetController();
        $this->assertEquals(10,$TestProjetController->ajouter(3,7));
        $this->assertEquals(-10.5,$TestProjetController->ajouter(-3,-7.5));
        $this->assertFalse(false,$TestProjetController->ajouter(-3,null));
        $this->assertFalse(false,$TestProjetController->ajouter(null,null));
        $this->assertFalse(false,$TestProjetController->ajouter(-3,'papa'));
    }

    public function testSoustraire()
    {
        $TestProjetController = new TestProjetController();
        $this->assertEquals(-4,$TestProjetController->soustraire(3,7));
        $this->assertEquals(4.5,$TestProjetController->soustraire(-3,-7.5));
        $this->assertFalse(false,$TestProjetController->soustraire(null,5));
        $this->assertFalse(false,$TestProjetController->soustraire(null,null));
        $this->assertFalse(false,$TestProjetController->soustraire(-3,'papa'));
    }

    public function testMultiplier()
    {
        $TestProjetController = new TestProjetController();
        $this->assertEquals(21,$TestProjetController->multiplier(3,7));
        $this->assertEquals(24,$TestProjetController->multiplier(-3,-8));
        $this->assertEquals(-12,$TestProjetController->multiplier(-2,6));
        $this->assertFalse(false,$TestProjetController->multiplier(null,null));
        $this->assertFalse(false,$TestProjetController->multiplier(-3,'papa'));
        $this->assertFalse(false,$TestProjetController->multiplier(-0,0));
    }

    public function testDiviser()
    {
        $TestProjetController = new TestProjetController();
        $this->assertEquals(0.43,$TestProjetController->diviser(3,7));
        $this->assertEquals(0.38,$TestProjetController->diviser(-3,-8));
        $this->assertEquals(-0.33,$TestProjetController->diviser(-2,6));
        $this->assertFalse(false,$TestProjetController->diviser(null,null));
        $this->assertFalse(false,$TestProjetController->diviser(-3,'papa'));
        $this->assertFalse(false,$TestProjetController->diviser(-0,0));
    }

    public function testCalculatrice()
    {
        $TestProjetController = new TestProjetController();
        $this->assertFalse(false,$TestProjetController->calculatrice('totoCaCa!!',-2,'-6x'));
        $this->assertEquals(0.43,$TestProjetController->calculatrice('diviser',3,7));
        $this->assertEquals(0.38,$TestProjetController->calculatrice('diviser',-3,-8));
        $this->assertEquals(4,$TestProjetController->calculatrice('ajouter',-2,6));
        $this->assertEquals(-8,$TestProjetController->calculatrice('soustraire',-2,6));
        $this->assertFalse(false,$TestProjetController->calculatrice('soustraire',-2,'-6x'));
        $this->assertFalse(false,$TestProjetController->calculatrice('multiplier',null,null));
        $this->assertFalse(false,$TestProjetController->calculatrice('multiplier',-3,'papa'));
        $this->assertFalse(false,$TestProjetController->calculatrice('ajouter',-0,0));
        $this->assertFalse(false,$TestProjetController->calculatrice('ajouter',-0,0));
    }

    public function testGenerateRandomToken()
    {
        $TestProjetController = new TestProjetController();
        $this->assertFalse(false,$TestProjetController->generateRandomToken('&#;?ù%*§!,$£'));
        $this->assertFalse(false,$TestProjetController->generateRandomToken('ADEvgtser§!,$£'));
        $this->assertTrue(true,$TestProjetController->generateRandomToken('adefgrrABDSFGT45678'));
        $this->assertTrue(true,$TestProjetController->generateRandomToken('aAZERdef345REFG5678'));
        $this->assertFalse(false,$TestProjetController->generateRandomToken('DGGHHH|_R'));
    }
}