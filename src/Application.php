<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24.07.2019
 * Time: 14:45
 */

namespace App;

use App\Animal\KittyFabric;
use App\Animal\PuppyFabric;
use App\Interfacing\IParamParser;
use App\Interfacing\IView;

class Application
{
    /**
     * Выполнение логики
     * @param IView $view
     * @param IParamParser $parameters
     * @return mixed
     */
    public function run(IView $view, IParamParser $parameters)
    {
        $dogs       = PuppyFabric::create($parameters->getPuppyAmount());
        $cats       = KittyFabric::create($parameters->getKittyAmount());
        $animals    = array_merge($dogs, $cats);
        $box        = BoxFabric::create($parameters->getBoxSquare());
        $outBox     = new OutBox();
        $portions   = FoodFabric::create($parameters->getPuppyAmount()+$parameters->getKittyAmount());
        $inserter   = new Inserter();

        shuffle($animals);

        foreach ($animals as $animal) {
            $animal->eat(array_pop($portions));
        }

        $inserter->insert($animals, $box, $outBox);
        $box->doToilet();
        $outBox->doToilet();

        $boxPresenter       = new BoxPresenter($box);
        $outBoxPresenter    = new OutBoxPresenter($outBox);

        $view->viewer($boxPresenter, $outBoxPresenter);

        if ($box->clearRequired()) {
            $box->clearCrap();
        }
    }
}
