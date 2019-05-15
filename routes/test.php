<?php


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
        $minDamage    = $damageBase - $damageFactor;
        $maxDamage    = $damageBase + $damageFactor;

        return mt_rand($minDamage, $maxDamage);
    }
}

class Fight
{

    public function makeFight(HeroInterface $attacker, HeroInterface $defender)
    {
        $damage = DamageCalculator::getDamage($attacker, $defender);
        $defender->setHealthPoints($defender->getHealthPoints()-$damage);
    }
}

class FightTest extends TestCase {

    public function testMakeFight()
    {
        // implement the test
    }
}