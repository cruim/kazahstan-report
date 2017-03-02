<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Connection;
use yii\grid\DataColumn;


/**
 * This is the model class for table "order".
 *
 * @property integer $order_id
 * @property string $order_number
 * @property string $order_externalId
 * @property string $order_orderType
 * @property string $order_orderMethod
 * @property string $order_createdAt
 * @property string $order_statusUpdatedAt
 * @property double $order_summ
 * @property double $order_totalSumm
 * @property double $order_prepaySum
 * @property double $order_purchaseSumm
 * @property double $order_discount
 * @property double $order_discountPercent
 * @property integer $order_mark
 * @property string $order_markDatetime
 * @property string $order_lastName
 * @property string $order_firstName
 * @property string $order_patronymic
 * @property string $order_phone
 * @property string $order_additionalPhone
 * @property string $order_email
 * @property integer $order_call
 * @property integer $order_expired
 * @property string $order_customerComment
 * @property string $order_managerComment
 * @property string $order_paymentDetail
 * @property integer $order_managerId
 * @property string $order_paymentType
 * @property string $order_paymentStatus
 * @property string $order_site
 * @property string $order_status
 * @property string $order_statusComment
 * @property string $order_sourceId
 * @property integer $order_fromApi
 * @property string $order_shipmentDate
 * @property integer $order_shipped
 * @property string $order_contragentType
 * @property string $order_legalName
 * @property string $order_legalAddress
 * @property string $order_INN
 * @property string $order_OKPO
 * @property string $order_KPP
 * @property string $order_OGRN
 * @property string $order_OGRNIP
 * @property string $order_certificateNumber
 * @property string $order_certificateDate
 * @property string $order_BIK
 * @property string $order_bank
 * @property string $order_bankAddress
 * @property string $order_corrAccount
 * @property string $order_bankAccount
 * @property string $order_shipmentStore
 * @property string $order_slug
 * @property integer $order_deleted
 * @property string $order_countryIso
 * @property integer $order_uploadedToExternalStoreSystem
 *
 */

class NumberColumn extends DataColumn
{
    private $_total = 0;

    public function getDataCellValue($model, $key, $index)
    {

        $value = parent::getDataCellValue($model, $key, $index);
        if($index != 0 and $index != 10 and $index != 19 and $index != 28 and $index != 31 and $index != 32 and $index != 33 and  $index != 35
            and $index != 37 and $index != 38 or $index != 40 and $index != 44){
            $this->_total += $value;}
        return $value;
    }

    protected function renderFooterCellContent()
    {

        return $this->grid->formatter->format($this->_total, $this->format);;
    }
}
class Order extends \yii\db\ActiveRecord
{


public $name = 'Здоров Групп КЗ'; //переменная для заполнения всея ячеек колонки 'Менеджер'

    public $euro_rate = 64;
    public $a = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    





    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id', 'order_mark', 'order_call', 'order_expired', 'order_managerId', 'order_fromApi', 'order_shipped', 'order_deleted', 'order_uploadedToExternalStoreSystem'], 'integer'],
            [['order_createdAt', 'order_statusUpdatedAt', 'order_markDatetime', 'order_shipmentDate', 'order_certificateDate'], 'safe'],
            [['order_summ', 'order_totalSumm', 'order_prepaySum', 'order_purchaseSumm', 'order_discount', 'order_discountPercent'], 'number'],
            [['order_number', 'order_externalId', 'order_orderType', 'order_orderMethod', 'order_email', 'order_paymentType', 'order_paymentStatus', 'order_status', 'order_contragentType', 'order_legalName', 'order_INN', 'order_OKPO', 'order_KPP', 'order_OGRN', 'order_OGRNIP', 'order_certificateNumber', 'order_BIK', 'order_bank', 'order_bankAddress', 'order_corrAccount', 'order_bankAccount', 'order_shipmentStore', 'order_slug', 'order_countryIso'], 'string', 'max' => 45],
            [['order_lastName', 'order_firstName', 'order_patronymic', 'order_phone', 'order_additionalPhone', 'order_site', 'order_sourceId', 'order_legalAddress'], 'string', 'max' => 255],
            [['order_customerComment', 'order_paymentDetail', 'order_statusComment'], 'string', 'max' => 2048],
            [['order_managerComment'], 'string', 'max' => 4096],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_number' => 'Номер заказа',
            'order_externalId' => 'Order External ID',
            'order_orderType' => 'Order Order Type',
            'order_orderMethod' => 'Order Order Method',
            'order_createdAt' => 'Order Created At',
            'order_statusUpdatedAt' => 'Order Status Updated At',
            'order_summ' => 'Order Summ',
            'order_totalSumm' => 'Сумма заказа',
            'order_prepaySum' => 'Order Prepay Sum',
            'order_purchaseSumm' => 'Order Purchase Summ',
            'order_discount' => 'Order Discount',
            'order_discountPercent' => 'Order Discount Percent',
            'order_mark' => 'Order Mark',
            'order_markDatetime' => 'Order Mark Datetime',
            'order_lastName' => 'Order Last Name',
            'order_firstName' => 'Order First Name',
            'order_patronymic' => 'Order Patronymic',
            'order_phone' => 'Номер телефона',
            'order_additionalPhone' => 'Order Additional Phone',
            'order_email' => 'Order Email',
            'order_call' => 'Order Call',
            'order_expired' => 'Order Expired',
            'order_customerComment' => 'Order Customer Comment',
            'order_managerComment' => 'Order Manager Comment',
            'order_paymentDetail' => 'Order Payment Detail',
            'order_managerId' => 'Order Manager ID',
            'order_paymentType' => 'Order Payment Type',
            'order_paymentStatus' => 'Order Payment Status',
            'order_site' => 'Order Site',
            'order_status' => 'Order Status',
            'order_statusComment' => 'Order Status Comment',
            'order_sourceId' => 'Order Source ID',
            'order_fromApi' => 'Order From Api',
            'order_shipmentDate' => 'Order Shipment Date',
            'order_shipped' => 'Order Shipped',
            'order_contragentType' => 'Order Contragent Type',
            'order_legalName' => 'Order Legal Name',
            'order_legalAddress' => 'Order Legal Address',
            'order_INN' => 'Order  Inn',
            'order_OKPO' => 'Order  Okpo',
            'order_KPP' => 'Order  Kpp',
            'order_OGRN' => 'Order  Ogrn',
            'order_OGRNIP' => 'Order  Ogrnip',
            'order_certificateNumber' => 'Order Certificate Number',
            'order_certificateDate' => 'Order Certificate Date',
            'order_BIK' => 'Order  Bik',
            'order_bank' => 'Order Bank',
            'order_bankAddress' => 'Order Bank Address',
            'order_corrAccount' => 'Order Corr Account',
            'order_bankAccount' => 'Order Bank Account',
            'order_shipmentStore' => 'Order Shipment Store',
            'order_slug' => 'Order Slug',
            'order_deleted' => 'Order Deleted',
            'order_countryIso' => 'Order Country Iso',
            'order_uploadedToExternalStoreSystem' => 'Order Uploaded To External Store System',
        ];
    }

    public function getAddress(){
        return $this->hasOne(OrderDeliveryAddress::className(), ['order_id' => 'order_id']);
    }

    public function getItems(){
        return $this->hasOne(OrderItems::className(), ['order_id' => 'order_id']);
    }

    public function getItemsOrder(){
        return $this->hasMany(OrderItems::className(), ['order_id' => 'order_id']);
    }
    
    public function getOrderDeliveryData(){
        return $this->hasOne(OrderDeliveryData::className(), ['order_id' => 'order_id']);
    }

    public function getCustomFields(){
        return $this->hasOne(OrderCustomFields::className(), ['order_id' => 'order_id']);
    }

    public static function getCheck(){
        return   Yii::$app->getDb()->createCommand(
            " select Concat(`delivery-types`.`delivery-types_name`,' ноябрь 16') as '36',
sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM `delivery-types`

INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
WHERE order_delivery.order_delivery_code is not null
and `order`.order_createdAt BETWEEN '2016-11-01' and '2016-12-01'
AND order_delivery.order_delivery_code in('kz-nds')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`

UNION

SELECT order_delivery_data.order_delivery_data_name,

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан КАЗПОЧТА','Казахстан Курьеры')
and `order`.order_createdAt BETWEEN '2016-11-01' and '2016-12-01' 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION

SELECT order_customFields.order_customFields_delivery_method,

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id

where `order`.order_createdAt BETWEEN '2016-11-01' and '2016-12-01'
and order_customFields.order_customFields_delivery_method in('kz_kotransit','kz_pony','kz_post')

and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method
UNION

 select Concat(`delivery-types`.`delivery-types_name`,' декабрь 16'),

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM `delivery-types`

INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where `order`.order_createdAt BETWEEN '2016-12-01' and '2017-01-01'
AND order_delivery.order_delivery_code in('kz-nds')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`

UNION

SELECT order_delivery_data.order_delivery_data_name,

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан КАЗПОЧТА','Казахстан Курьеры')
and `order`.order_createdAt BETWEEN '2016-12-01' and '2017-01-01' 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION

SELECT order_customFields.order_customFields_delivery_method,

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id

where `order`.order_createdAt BETWEEN '2016-12-01' and '2017-01-01'
and order_customFields.order_customFields_delivery_method in('kz_kotransit','kz_pony','kz_post')

and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method

UNION

 select Concat(`delivery-types`.`delivery-types_name`,' январь 17'),

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM `delivery-types`

INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where `order`.order_createdAt BETWEEN '2017-01-01' and '2017-02-01'
AND order_delivery.order_delivery_code in('kz-nds')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`

UNION

SELECT order_delivery_data.order_delivery_data_name,

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан КАЗПОЧТА','Казахстан Курьеры')
and `order`.order_createdAt BETWEEN '2017-01-01' and '2017-02-01' 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION

SELECT order_customFields.order_customFields_delivery_method,

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id

where `order`.order_createdAt BETWEEN '2017-01-01' and '2017-02-01'
and order_customFields.order_customFields_delivery_method in('kz_kotransit','kz_pony','kz_post')

and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method

UNION

 select Concat(`delivery-types`.`delivery-types_name`,' февраль 17'),

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM `delivery-types`

INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where `order`.order_createdAt BETWEEN '2017-02-01' and '2017-03-01'
AND order_delivery.order_delivery_code in('kz-nds')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`

UNION

SELECT order_delivery_data.order_delivery_data_name,

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан КАЗПОЧТА','Казахстан Курьеры')
and `order`.order_createdAt BETWEEN '2017-02-01' and '2017-03-01' 
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION

SELECT order_customFields.order_customFields_delivery_method,

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id

where `order`.order_createdAt BETWEEN '2017-02-01' and '2017-03-01'
and order_customFields.order_customFields_delivery_method in('kz_kotransit','kz_pony','kz_post')

and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method

UNION

 select Concat(`delivery-types`.`delivery-types_name`,' март 17'),

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM `delivery-types`

INNER JOIN order_delivery ON `delivery-types`.`delivery-types_code` = order_delivery.order_delivery_code
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where `order`.order_createdAt BETWEEN '2017-03-01' and '2017-04-01'
AND order_delivery.order_delivery_code in('kz-nds')
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY `delivery-types`.`delivery-types_name`

UNION

SELECT order_delivery_data.order_delivery_data_name,

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан КАЗПОЧТА','Казахстан Курьеры')
and `order`.order_createdAt BETWEEN '2017-03-01' and '2017-04-01'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY order_delivery_data.order_delivery_data_name

UNION

SELECT order_customFields.order_customFields_delivery_method,

sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid

FROM order_customFields 
  INNER JOIN `order` ON order_customFields.order_id = `order`.order_id

where `order`.order_createdAt BETWEEN '2017-03-01' and '2017-04-01'
and order_customFields.order_customFields_delivery_method in('kz_kotransit','kz_pony','kz_post')

and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
GROUP BY    
   order_customFields.order_customFields_delivery_method

UNION
select ifnull(null,'Итого'),sum(refusetosend) as refusetosend,sum(refusetoreceive) as refusetoreceive,
sum(parcelreturned) as parcelreturned,sum(send) as send,sum(stop) as 'stop',sum(sent) as sent,
sum(parcelonaplace) as parcelonaplace,sum(problem) as problem,sum(injob) as injob,sum(delivered) as delivered,
sum(paid) as paid
 from (
SELECT order_delivery.order_delivery_code,
sum(case `order`.order_status when 'refuse-to-send' then 1 else 0 end) refusetosend,
sum(case `order`.order_status when 'refuse-to-receive' then 1 else 0 end) refusetoreceive,
sum(case `order`.order_status when 'parcel-returned' then 1 else 0 end) parcelreturned,
sum(case `order`.order_status when 'send' then 1 else 0 end) send,
sum(case `order`.order_status when 'stop' then 1 else 0 end) stop,
sum(case `order`.order_status when 'sent' then 1 else 0 end) sent,
sum(case `order`.order_status when 'parcel-on-a-place' then 1 else 0 end) parcelonaplace,
sum(case `order`.order_status when 'problem' then 1 else 0 end) problem,
sum(case `order`.order_status when 'injob' then 1 else 0 end) injob,
sum(case `order`.order_status when 'delivered' then 1 else 0 end) delivered,
sum(case `order`.order_status when 'paid' then 1 else 0 end) paid
FROM order_delivery
INNER JOIN `order` ON order_delivery.order_id = `order`.order_id
where order_delivery.order_delivery_code in('kz-nds')
and order_createdAt >= '2016-11-01'
and `order`.order_site in ('zdorov-cream','joint-cream','vari-cream-com','gemor-cream','fungus-cream',
'cream-masthopaty','wrinkles-cream','osteochondrosis-cream','prosta-cream','psorias-cream','cellulite-cream',
'erectile-cream','elixir-gastritis','elixir-parasite','elixir-metabolism','european-union-DE-cream')
 )X
   ")->queryAll();
    }

    public static function getSavePost(){
        return   Yii::$app->getDb()->createCommand(
            "  SELECT order_delivery_data.order_delivery_data_name,

sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) then 1 else 0 end) '0-7 days',
sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 14 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 7  DAY) then 1 else 0 end) '8-14 days',
sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 14  DAY) then 1 else 0 end) '14+ days',
sum(case when `order`.order_status = 'sent' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан КАЗПОЧТА')


UNION

SELECT concat(order_delivery_data.order_delivery_data_name,' в точке получения'),

sum(case when `order`.order_status = 'parcel-on-a-place' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) then 1 else 0 end) `parcelonaplace 0-7`,
sum(case when `order`.order_status = 'parcel-on-a-place' and order_statusUpdatedAt BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 14 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 7  DAY) then 1 else 0 end) `parcelonaplace 8-14`,
sum(case When `order`.order_status = 'parcel-on-a-place' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 14  DAY) then 1 else 0 end) '14+ days',
sum(case when `order`.order_status = 'parcel-on-a-place' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end) `parcelonaplace итого`

FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан КАЗПОЧТА')

UNION

SELECT concat(order_delivery_data.order_delivery_data_name,' всего'),

sum(case when `order`.order_status in(\"parcel-on-a-place\", 'sent') and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) then 1 else 0 end) `parcelonaplace 0-7`,
sum(case when `order`.order_status in(\"parcel-on-a-place\", 'sent') and order_statusUpdatedAt BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 14 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 7  DAY) then 1 else 0 end) 'parcelonaplace 8-14',
sum(case When `order`.order_status in(\"parcel-on-a-place\", 'sent') AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 14  DAY) then 1 else 0 end) '14+ days',
sum(case when `order`.order_status  in(\"parcel-on-a-place\", 'sent') and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end) `parcelonaplace итого`

FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан КАЗПОЧТА')
")->queryAll();
    }

    public static function getSaveCourier(){
        return   Yii::$app->getDb()->createCommand(
            " SELECT order_delivery_data.order_delivery_data_name,

sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 3 DAY) then 1 else 0 end) '0-3 days',
sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 5 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 3  DAY) then 1 else 0 end) '4-5 days',
sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 5  DAY) then 1 else 0 end) '6+ days',
sum(case when `order`.order_status = 'sent' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан Курьеры')


UNION
SELECT concat(order_customFields_delivery_method,' отправлен'),

sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 3 DAY) then 1 else 0 end) '0-3 days',
sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 5 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 3  DAY) then 1 else 0 end) '4-5 days',
sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 5  DAY) then 1 else 0 end) '6+ days',
sum(case when `order`.order_status = 'sent' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_customFields
INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_customFields.order_customFields_delivery_method in ('kz_kotransit')

UNION
SELECT concat(order_customFields_delivery_method,' отправлен'),

sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 3 DAY) then 1 else 0 end) '0-3 days',
sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 5 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 3  DAY) then 1 else 0 end) '4-5 days',
sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 5  DAY) then 1 else 0 end) '6+ days',
sum(case when `order`.order_status = 'sent' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_customFields
INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_customFields.order_customFields_delivery_method in ('kz_pony')

UNION
SELECT concat(order_customFields_delivery_method,' отправлен'),

sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 3 DAY) then 1 else 0 end) '0-3 days',
sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 5 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 3  DAY) then 1 else 0 end) '4-5 days',
sum(case When `order`.order_status = 'sent' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 5  DAY) then 1 else 0 end) '6+ days',
sum(case when `order`.order_status = 'sent' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_customFields
INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_customFields.order_customFields_delivery_method in ('kz_post')
")->queryAll();
    }

    public static function getPDZCourier(){
        return   Yii::$app->getDb()->createCommand(
            " SELECT order_delivery_data.order_delivery_data_name,

sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) then 1 else 0 end) '0-7 days',
sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 10 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 7  DAY) then 1 else 0 end) '8-10 days',
sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 10  DAY) then 1 else 0 end) '11+ days',
sum(case when `order`.order_status = 'delivered' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан Курьеры')


UNION
SELECT concat(order_customFields_delivery_method,' товар получен'),

sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) then 1 else 0 end) '0-7 days',
sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 10 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 7  DAY) then 1 else 0 end) '8-10 days',
sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 10  DAY) then 1 else 0 end) '10+ days',
sum(case when `order`.order_status = 'delivered' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_customFields
INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_customFields.order_customFields_delivery_method in ('kz_kotransit')

UNION
SELECT concat(order_customFields_delivery_method,' товар получен'),

sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) then 1 else 0 end) '0-7 days',
sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 10 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 7  DAY) then 1 else 0 end) '8-10 days',
sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 10  DAY) then 1 else 0 end) '10+ days',
sum(case when `order`.order_status = 'delivered' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_customFields
INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_customFields.order_customFields_delivery_method in ('kz_pony')

UNION
SELECT concat(order_customFields_delivery_method,' товар получен'),

sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) then 1 else 0 end) '0-7 days',
sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 10 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 7  DAY) then 1 else 0 end) '8-10 days',
sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 10  DAY) then 1 else 0 end) '10+ days',
sum(case when `order`.order_status = 'delivered' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_customFields
INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_customFields.order_customFields_delivery_method in ('kz_post')
")->queryAll();
    }

    public static function getPDZPost(){
        return   Yii::$app->getDb()->createCommand(
            " SELECT order_delivery_data.order_delivery_data_name,

sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 3 DAY) then 1 else 0 end) '0-3 days',
sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 3  DAY) then 1 else 0 end) '4-7 days',
sum(case When `order`.order_status = 'delivered' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 7  DAY) then 1 else 0 end) '8+ days',
sum(case when `order`.order_status = 'delivered' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан КАЗПОЧТА')
")->queryAll();
    }

    public static function getStorage(){
        return   Yii::$app->getDb()->createCommand(
            " SELECT order_delivery_data.order_delivery_data_name, `order`.order_id,

sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) then 1 else 0 end) '0-1 days',
sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 1  DAY) then 1 else 0 end) '2-4 days',
sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 4  DAY) then 1 else 0 end) '5+ days',
sum(case when `order`.order_status = 'send' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан КАЗПОЧТА')

UNION

SELECT concat(order_delivery_data.order_delivery_data_name,' отправлять'), `order`.order_id,

sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) then 1 else 0 end) '0-1 days',
sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 1  DAY) then 1 else 0 end) '2-4 days',
sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 4  DAY) then 1 else 0 end) '5+ days',
sum(case when `order`.order_status = 'send' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан Курьеры')

UNION
SELECT concat(order_customFields_delivery_method,' отправлен'), `order`.order_id,

sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) then 1 else 0 end) '0-1 days',
sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 1  DAY) then 1 else 0 end) '2-4 days',
sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 4  DAY) then 1 else 0 end) '5+ days',
sum(case when `order`.order_status = 'send' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_customFields
INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_customFields.order_customFields_delivery_method in ('kz_kotransit')

UNION
SELECT concat(order_customFields_delivery_method,' отправлен'), `order`.order_id,

sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) then 1 else 0 end) '0-1 days',
sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 1  DAY) then 1 else 0 end) '2-4 days',
sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 4  DAY) then 1 else 0 end) '5+ days',
sum(case when `order`.order_status = 'send' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_customFields
INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_customFields.order_customFields_delivery_method in ('kz_pony')

UNION
SELECT concat(order_customFields_delivery_method,' отправлен'), `order`.order_id,

sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) then 1 else 0 end) '0-1 days',
sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 1  DAY) then 1 else 0 end) '2-4 days',
sum(case When `order`.order_status = 'send' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 4  DAY) then 1 else 0 end) '5+ days',
sum(case when `order`.order_status = 'send' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_customFields
INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_customFields.order_customFields_delivery_method in ('kz_post')

UNION
SELECT concat(order_delivery_data.order_delivery_data_name,' приостановлен'), `order`.order_id,

sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) then 1 else 0 end) '0-1 days',
sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 1  DAY) then 1 else 0 end) '2-4 days',
sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 4  DAY) then 1 else 0 end) '5+ days',
sum(case when `order`.order_status = 'stop' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан КАЗПОЧТА')

UNION
SELECT concat(order_delivery_data.order_delivery_data_name,' приостановлен'), `order`.order_id,

sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) then 1 else 0 end) '0-1 days',
sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 1  DAY) then 1 else 0 end) '2-4 days',
sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 4  DAY) then 1 else 0 end) '5+ days',
sum(case when `order`.order_status = 'stop' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_delivery_data
INNER JOIN `order` ON order_delivery_data.order_id = `order`.order_id
where order_delivery_data.order_delivery_data_name in ('Казахстан Курьеры')

UNION
SELECT concat(order_customFields_delivery_method,' отправлен'), `order`.order_id,

sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) then 1 else 0 end) '0-1 days',
sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 1  DAY) then 1 else 0 end) '2-4 days',
sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 4  DAY) then 1 else 0 end) '5+ days',
sum(case when `order`.order_status = 'stop' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_customFields
INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_customFields.order_customFields_delivery_method in ('kz_kotransit')

UNION
SELECT concat(order_customFields_delivery_method,' отправлен'), `order`.order_id,

sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) then 1 else 0 end) '0-1 days',
sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 1  DAY) then 1 else 0 end) '2-4 days',
sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 4  DAY) then 1 else 0 end) '5+ days',
sum(case when `order`.order_status = 'stop' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_customFields
INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_customFields.order_customFields_delivery_method in ('kz_pony')

UNION
SELECT concat(order_customFields_delivery_method,' отправлен'), `order`.order_id,

sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) then 1 else 0 end) '0-1 days',
sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 4 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 1  DAY) then 1 else 0 end) '2-4 days',
sum(case When `order`.order_status = 'stop' AND order_statusUpdatedAt  BETWEEN  DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) 
AND  DATE_SUB(CURRENT_DATE, INTERVAL 4  DAY) then 1 else 0 end) '5+ days',
sum(case when `order`.order_status = 'stop' and order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY) then 1 else 0 end)  'итого'
                   


FROM order_customFields
INNER JOIN `order` ON order_customFields.order_id = `order`.order_id
where order_customFields.order_customFields_delivery_method in ('kz_post')

")->queryAll();
    }

    public static function downloadPDZCourier(){
        return   Yii::$app->getDb()->createCommand(
            "SELECT IF(diff<7,order_number,NULL)  order_t1,
       IF(diff>=7 and diff<=10,order_number,NULL) order_t2,
       IF(diff>10,order_number,NULL) order_t3,
order_delivery_data_name,order_customFields_delivery_method,order_status_name
  FROM (
    SELECT order_status_name,order_delivery_data_name,order_customFields_delivery_method,`order`.order_id,`order`.order_number,datediff(CURRENT_DATE, `order`.order_statusUpdatedAt) diff
      FROM `order` 
     inner join order_delivery_data on `order`.order_id = order_delivery_data.order_id
INNER JOIN order_status on `order`.order_status = order_status.order_status_code
inner join order_customFields on `order`.order_id = order_customFields.order_id
     where `order`.order_status = 'delivered'
       AND `order`.order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY)
       and order_delivery_data_name in ('Казахстан Курьеры')
  ) X
")->queryAll();
    }

    public static function downloadPDZPost(){
        return   Yii::$app->getDb()->createCommand(
            "SELECT IF(diff<7,order_number,NULL)  order_t1,
       IF(diff>=7 and diff<=10,order_number,NULL) order_t2,
       IF(diff>10,order_number,NULL) order_t3,
order_status_name,order_delivery_data_name
  FROM (
    SELECT order_status_name,order_delivery_data_name,`order`.order_id,`order`.order_number,datediff(CURRENT_DATE, `order`.order_statusUpdatedAt) diff
      FROM `order` 
     inner join order_delivery_data on `order`.order_id = order_delivery_data.order_id
INNER JOIN order_status on `order`.order_status = order_status.order_status_code
     where `order`.order_status = 'delivered'
       AND `order`.order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY)
       and order_delivery_data_name in ('Казахстан КАЗПОЧТА')
  ) X
")->queryAll();
    }

    public static function downloadSavePost(){
        return   Yii::$app->getDb()->createCommand(
            "SELECT IF(diff<7,order_number,NULL)  order_t1,
       IF(diff>=7 and diff<=14,order_number,NULL) order_t2,
       IF(diff>14,order_number,NULL) order_t3,order_status_name,order_delivery_data_name
  FROM (
    SELECT order_status_name,order_delivery_data_name,order_status,`order`.order_id,
`order`.order_number,datediff(CURRENT_DATE, `order`.order_statusUpdatedAt) diff
      FROM `order` 
     inner join order_delivery_data on `order`.order_id = order_delivery_data.order_id
		 INNER JOIN order_status on `order`.order_status = order_status.order_status_code
     where `order`.order_status in ('parcel-on-a-place','sent')
       AND `order`.order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY)
       and order_delivery_data_name in ('Казахстан КАЗПОЧТА')
  ) Y
")->queryAll();
    }

    public static function downloadSaveCourier(){
        return   Yii::$app->getDb()->createCommand(
            "SELECT IF(diff<3,order_number,NULL)  order_t1,
       IF(diff>=3 and diff<=5,order_number,NULL) order_t2,
       IF(diff>5,order_number,NULL) order_t3,order_status_name,order_delivery_data_name,order_customFields_delivery_method
  FROM (
    SELECT order_status_name,order_customFields_delivery_method, order_delivery_data_name,order_status,`order`.order_id,
`order`.order_number,datediff(CURRENT_DATE, `order`.order_statusUpdatedAt) diff
      FROM `order` 
     inner join order_delivery_data on `order`.order_id = order_delivery_data.order_id
		 inner join order_customFields on `order`.order_id = order_customFields.order_id
INNER JOIN order_status on `order`.order_status = order_status.order_status_code
     where `order`.order_status in ('sent')
       AND `order`.order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY)
       and order_delivery_data_name in ('Казахстан Курьеры')
  ) Y
")->queryAll();
    }

    public static function downloadStorage(){
        return   Yii::$app->getDb()->createCommand(
            "SELECT IF(diff<1,order_number,NULL)  order_t1,
       IF(diff>=1 and diff<=4,order_number,NULL) order_t2,
       IF(diff>4,order_number,NULL) order_t3,order_status_name,order_delivery_data_name,order_customFields_delivery_method
  FROM (
    SELECT order_status_name,order_customFields_delivery_method, order_delivery_data_name,order_status,`order`.order_id,
`order`.order_number,datediff(CURRENT_DATE, `order`.order_statusUpdatedAt) diff
      FROM `order` 
     inner join order_delivery_data on `order`.order_id = order_delivery_data.order_id
		 inner join order_customFields on `order`.order_id = order_customFields.order_id
     INNER JOIN order_status on `order`.order_status = order_status.order_status_code
     where `order`.order_status in ('send','stop')
       AND `order`.order_statusUpdatedAt >= DATE_SUB(CURRENT_DATE, INTERVAL 60 DAY)
       and order_delivery_data_name in ('Казахстан Курьеры','Казахстан КАЗПОЧТА')
  ) Y
")->queryAll();
    }
    
}
