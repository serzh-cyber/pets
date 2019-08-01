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
        shuffle($animals);
        $box        = BoxFabric::create($parameters->getBoxSquare());
        $outBox     = new OutBox();
        $inserter   = new Inserter();
        $feed       = new Feed();

        $inserter->insert($animals, $box, $outBox);
        $box->feedPets($feed);
        $outBox->feedPets($feed);
        $box->toiletPets();
        $outBox->toiletPets();
        $box->feedPets($feed);
        $outBox->feedPets($feed);

        $boxPresenter       = new BoxPresenter($box);
        $outBoxPresenter    = new OutBoxPresenter($outBox);

        return $view->viewer($boxPresenter, $outBoxPresenter);
    }
}
