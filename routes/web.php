<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

interface ConditionChecker
{
    public function isBadCondition() : bool;
}

interface ShapeCondition
{
    /**
     * check shape condition
     * @return bool
     */
    public function isBroken(): bool;

    /**
     * @param bool $condition
     * @return mixed
     */
    public function setIsBroken($condition);

}

interface PaintCondition
{
    /**
     * check Paint Condition
     * @return bool
     */
    public function isPaintingDamaged(): bool;

    /**
     * @param bool $condition
     * @return mixed
     */
    public function setIsPaintDamaged($condition);

}


abstract class CarDetail
{
    protected $isBroken;
    protected $isPaintDamaged;

}


class Door extends CarDetail implements ConditionChecker, ShapeCondition, PaintCondition
{
    public function isBroken(): bool
    {
        return $this->isBroken;
    }

    /**
     * @param $condition
     * @return $this
     */
    public function setIsBroken($condition = true)
    {
        $this->isBroken = $condition;
        return $this;

    }

    /**
     * @return bool
     */
    public function isPaintingDamaged(): bool
    {
        return $this->isPaintDamaged;
    }


    /**
     * @param bool $condition
     * @return $this
     */
    public function setIsPaintDamaged($condition = true)
    {
        $this->isPaintDamaged = $condition;

        return $this;

    }

    public function isBadCondition(): bool
    {
       return $this->isBroken() || $this->isPaintingDamaged();
    }
}

class Tyre extends CarDetail implements ConditionChecker, ShapeCondition
{
    /**
     * @return bool
     */
    public function isBroken(): bool
    {
        return $this->isBroken;
    }

    /**
     * @param $condition
     * @return $this
     */
    public function setIsBroken($condition = true)
    {
        $this->isBroken = $condition;
        return $this;

    }

    public function isBadCondition(): bool
    {
      return  $this->isBroken();
    }
}


class Car
{

    /**
     * @var CarDetail[]
     */
    private $details;

    /**
     * @param CarDetail[] $details
     */
    public function __construct(array $details)
    {
        $this->details = $details;
    }

    public function isBadCondition() : bool
    {
        foreach ($this->details as $detail) {

            if ($detail->isBadCondition()) {
                return true;
            }
        }

        return false;
    }

}


interface HeroInterface
{
    public function getForce(): int;

    public function getImmunity(): int;

    public function getHealthPoints(): int;

    public function setHealthPoints(int $healthPoints);
}

class DamageCalculator
{
    const DAMAGE_RAND_FACTOR = 0.2;

    public static function getDamage(HeroInterface $attacker, HeroInterface $defender)
    {
        if ($attacker->getForce() < $defender->getForce()) {
            return 0;
        }

        $damageBase = round(($attacker->getForce() - $defender->getForce()) / $defender->getImmunity());

        $damageFactor = $damageBase * self::DAMAGE_RAND_FACTOR;
        $minDamage = $damageBase - $damageFactor;
        $maxDamage = $damageBase + $damageFactor;

        return mt_rand($minDamage, $maxDamage);
    }
}

class Fight
{

    public function makeFight(HeroInterface $attacker, HeroInterface $defender)
    {
        $damage = DamageCalculator::getDamage($attacker, $defender);

        $defender->setHealthPoints($defender->getHealthPoints() - $damage);
    }
}

class Hero implements HeroInterface
{
    protected $force;

    protected $healthPoints = 0;

    protected $immunity;

    function __construct(int $force, int $immunity)
    {
        $this->force = $force;
        $this->immunity = $immunity;
    }

    public function getForce(): int
    {
        return $this->force;
    }

    public function getImmunity(): int
    {
        return $this->immunity;
    }

    public function getHealthPoints(): int
    {
        return $this->healthPoints;
    }

    public function setHealthPoints(int $healthPoints)
    {
        $this->healthPoints = $healthPoints;
    }
}

class FightTest extends \PHPUnit\Framework\TestCase
{

    public function testMakeFight()
    {
        $initialHealthPoint = 1000;
        $maxDamage = 4;
        //case 1
        $attacker1 = new Hero(40, 10);
        $defender1 = new Hero(20, 5);

        $defender1->setHealthPoints($initialHealthPoint);

        $fight1 = (new Fight())->makeFight($attacker1, $defender1);


        //We assume that we have a test class for Damage Calculator class

        $this->assertLessThan($initialHealthPoint, $defender1->getHealthPoints());
        $this->assertGreaterThanOrEqual($initialHealthPoint - $maxDamage, $defender1->getHealthPoints());


        //Case 2
        $initialHealthPoint = 50;

        $attacker2 = new Hero(30, 10);
        $defender2 = new Hero(30, 2);

        $defender2->setHealthPoints($initialHealthPoint);

        $fight2 = (new Fight())->makeFight($attacker2, $defender2);
        $this->assertEquals($initialHealthPoint, $defender2->getHealthPoints());
    }
}

Route::get('/test', function () {


    $test = new FightTest();

    $test->testMakeFight();


//    $damageBase = round(($attacker1->getForce() - $defender1->getForce()) / $defender1->getImmunity());
//
//    $damageFactor = $damageBase * DamageCalculator::DAMAGE_RAND_FACTOR;
//
//    $minDamage = $damageBase - $damageFactor;
//    $maxDamage = $damageBase + $damageFactor;
//
//    $damageExpected = mt_rand($minDamage, $maxDamage);
//
//
//
//    $damageCalculator = DamageCalculator::getDamage($attacker1, $defender1);
//
////        dd($damageCalculator);
//
    $car = new Car([(new Door)->setIsPaintDamaged(false)->setIsBroken(true), (new Tyre)->setIsBroken(false)]); // we pass a list of all details

    dd($car->isBadCondition());

    $user = new \App\Http\Controllers\User();

    $user->setFirstName('John')
        ->setLastName('Doe')
        ->setEmail('john.doe@example.com');

    echo $user;

});
Route::get('/{any?}', function () {
    return view('app');
})->where('any', '.*');
