<?php 
$summa = $model['price'];
$avans = ($model['avans']/100);
$komisiya = 0.04;
$srok = $model['mouth'];
$fix_komisiya = 0.015;

$kurs_UAH_USD = 0.039;
$kurs_EUR_USD = 1.11;

$kurs_USD_EUR = 0.90;
$kurs_USD_UAH = 25.38;

 switch ($model['currency_to']){
    case "UAH": $valuta_to = 'Гривня';  $summa = $summa*$kurs_UAH_USD; break;
    case "USD": $valuta_to = 'Доллар США';  break;
    case "EUR": $valuta_to = 'Євро'; $summa = $summa*$kurs_EUR_USD;  break;
            default :  $valuta_to = 'Доллар США'; break;
    
}


switch ($model['avans']){
    case 20: 
        $komisiya = 0.04;
            switch ($srok){
                case 12: $fix_komisiya = 0.015; break;
                case 24: $fix_komisiya = 0.017; break;
                case 36: $fix_komisiya = 0.019; break;
                case 48: $fix_komisiya = 0.0195; break;
                case 60: $fix_komisiya = 0.02; break;
                default : break;
            }
        break;
    case 25: 
        $komisiya = 0.0375;
            switch ($srok){
                case 12: $fix_komisiya = 0.014; break;
                case 24: $fix_komisiya = 0.0155; break;
                case 36: $fix_komisiya = 0.017; break;
                case 48: $fix_komisiya = 0.018; break;
                case 60: $fix_komisiya = 0.019; break;
                default : break;
            }
        break;
    case 30: 
        $komisiya = 0.035;
            switch ($srok){
                case 12: $fix_komisiya = 0.013; break;
                case 24: $fix_komisiya = 0.014; break;
                case 36: $fix_komisiya = 0.015; break;
                case 48: $fix_komisiya = 0.017; break;
                case 60: $fix_komisiya = 0.018; break;
                default : break;
            }
        break;
              case 35: 
        $komisiya = 0.0325;
            switch ($srok){
                case 12: $fix_komisiya = 0.012; break;
                case 24: $fix_komisiya = 0.013; break;
                case 36: $fix_komisiya = 0.014; break;
                case 48: $fix_komisiya = 0.016; break;
                case 60: $fix_komisiya = 0.0165; break;
                default : break;
            }
        break;  
    case 40: 
        $komisiya = 0.03;
            switch ($srok){
                case 12: $fix_komisiya = 0.011; break;
                case 24: $fix_komisiya = 0.012; break;
                case 36: $fix_komisiya = 0.013; break;
                case 48: $fix_komisiya = 0.0145; break;
                case 60: $fix_komisiya = 0.0155; break;
                default : break;
            }
        break;
    case 45: 
        $komisiya = 0.029;
            switch ($srok){
                case 12: $fix_komisiya = 0.01; break;
                case 24: $fix_komisiya = 0.011; break;
                case 36: $fix_komisiya = 0.012; break;
                case 48: $fix_komisiya = 0.0135; break;
                case 60: $fix_komisiya = 0.014; break;
                default : break;
            }
        break;
    case 50: 
        $komisiya = 0.0275;
            switch ($srok){
                case 12: $fix_komisiya = 0.009; break;
                case 24: $fix_komisiya = 0.01; break;
                case 36: $fix_komisiya = 0.011; break;
                case 48: $fix_komisiya = 0.012; break;
                case 60: $fix_komisiya = 0.013; break;
                default : break;
            }
        break;
    case 55: 
        $komisiya = 0.0265;
            switch ($srok){
                case 12: $fix_komisiya = 0.008; break;
                case 24: $fix_komisiya = 0.009; break;
                case 36: $fix_komisiya = 0.01; break;
                case 48: $fix_komisiya = 0.011; break;
                case 60: $fix_komisiya = 0.0115; break;
                default : break;
            }
        break;
    case 60: 
        $komisiya = 0.025;
            switch ($srok){
                case 12: $fix_komisiya = 0.007; break;
                case 24: $fix_komisiya = 0.008; break;
                case 36: $fix_komisiya = 0.009; break;
                case 48: $fix_komisiya = 0.0095; break;
                case 60: $fix_komisiya = 0.01; break;
                default : break;
            }
        break;
    case 65: 
        $komisiya = 0.024;
            switch ($srok){
                case 12: $fix_komisiya = 0.006; break;
                case 24: $fix_komisiya = 0.007; break;
                case 36: $fix_komisiya = 0.008; break;
                case 48: $fix_komisiya = 0.0085; break;
                case 60: $fix_komisiya = 0.009; break;
                default : break;
            }
        break;
    case 70: 
        $komisiya = 0.0225;
            switch ($srok){
                case 12: $fix_komisiya = 0.005; break;
                case 24: $fix_komisiya = 0.005; break;
                case 36: $fix_komisiya = 0.007; break;
                case 48: $fix_komisiya = 0.007; break;
                case 60: $fix_komisiya = 0.0075; break;
                default : break;
            }
        break;
    
    default : break;
}
 $dop_kom = $summa*$fix_komisiya;
 $stavka = round(($dop_kom/($summa-($summa*$avans))*12)*100,2);
 $p_plateg = round($summa*($avans+$komisiya),2);
 $plateg = round(($summa-($summa*$avans))/$srok+$dop_kom, 2);
 $sum_plat= ceil($srok*$plateg);
 $pereplata = $srok*$dop_kom;
 
 switch ($model['currency']){
    case 'UAH': $valuta = 'Гривня';  $plateg =  round($plateg*$kurs_USD_UAH,2);  $p_plateg =  round($p_plateg*$kurs_USD_UAH,2); break;
    case 'USD': $valuta = 'Доллар США'; break;
    case 'EUR': $valuta = 'Євро'; $plateg =  round($plateg*$kurs_USD_EUR,2);  $p_plateg =  round($p_plateg*$kurs_USD_EUR,2); break;
            default : $valuta = 'Доллар США'; break;
    
}
?>

<table class="table">
    <thead>
        <tr>
            <th style="width: 300px;">Опис</th>
            <th>Результат</th>
        </tr>
    </thead>
    <tbody>
               <!-- <tr>
            <td>Тип транспорту</td>
            <td><?= frontend\models\AutoCategories::findOne($model['type'])->name?></td>
        </tr>-->
        
        <tr>
            <td>Валюта фінансівання</td>
            <td><?=$valuta_to?></td>
        </tr>
                <tr>
            <td>Вартість</td>
            <td><?=$model['price'].' '.$model['currency_to']?></td>
        </tr>
        <tr>
            <td>Валюта фінансівання</td>
            <td><?=$valuta?></td>
        </tr>
       <!-- 
        <tr>
            <td>Фікс.комиссия</td>
            <td><?=$fix_komisiya?>%</td>
        </tr>
        <tr>
            <td>Доп.комиссия</td>
            <td><?=$dop_kom?></td>
        </tr>-->
        <tr>
            <td>Ставка</td>
            <td><?=$stavka?>%</td>
        </tr>
                <tr>
            <td>Перший платіж</td>
            <td><?=$p_plateg.' '.$model['currency']?></td>
        </tr>
         
        
                <tr>
            <td>Щомісячний платіж</td>
            <td><?=$plateg.' '.$model['currency']?></td>
        </tr>
       <!--   <tr>
            <td>Сумма платежей</td>
            <td><?=$sum_plat?></td>
        </tr>
        <tr>
            <td>Переплата</td>
            <td><?=$pereplata?></td>
        </tr>
        -->
        
                <tr>
            <td>Період дії договору, міс.</td>
            <td><?=$srok?> міс.</td>
        </tr>
            </tbody>
</table>