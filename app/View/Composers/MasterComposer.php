<?php
namespace App\View\Composers;

use App\Models\CategoryProduct;
use App\Models\Option;
use Illuminate\View\View;

class MasterComposer
{
    public function compose(View $view)
    {

        $view->with('favicon', $this->getOption('favicon'));
        $view->with('logo', $this->getOption('logo'));
        $view->with('description', $this->getOption('description'));
        $view->with('phone', $this->getOption('phone'));
        $view->with('email', $this->getOption('email'));
        $view->with('address', $this->getOption('address'));
        $listCategory = app('proxy')->getCategory(
            nested: true,
        );
        $view->with('listCategory', $listCategory);
        $iframe = $this->getOption('iframe');
        $view->with('iframe', $iframe);
    }
    public function getOption($key)
    {
        $option = Option::where('key', $key)->first();
        if ($option) {
            $option = $option->value;
        }
        return $option;
    }
}
