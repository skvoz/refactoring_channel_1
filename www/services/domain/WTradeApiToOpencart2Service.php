<?php

namespace Services\domain;

use App\models\Main;
use Illuminate\Support\Facades\DB;
use Services\api\InterfaceServiceClient;
use Services\domain\exceptions\WTradeApiToOpencart2ServiceException;

class WTradeApiToOpencart2Service
{
    protected InterfaceServiceClient $apiClient;

    public function __construct(InterfaceServiceClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function run($debug = false): void
    {
        try {
            DB::beginTransaction();

            $name1 = $this->apiClient->run();
            $model = new Main();
            $model->field1 = $name1;
            $model->save();
            $name2 = $this->apiClient->run();
            $model->field2 = $name2;
            $model->update();

            $name3 = $this->apiClient->run();
            $model->field3 = $name3;
            $model->update();

            $name4 = $this->apiClient->run();
            $model->field4 = $name4;
            $model->update();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new WTradeApiToOpencart2ServiceException('Rollback success.' .
                $e->getMessage());
        }
    }
}
