<?php

function gengo($seireki)
{
    if(1868<=$seireki && $seireki<=1911)
    {
        $gengo='明治';
    }

    if(1912<=$seireki && $seireki<=1925)
    {
        $gengo='大正';
    }

    if(1926<=$seireki && $seireki<=1988)
    {
        $gengo='昭和';
    }

    if(1989<=$seireki)
    {
        $gengo='平成';
    }

    return($gengo);
}

function pulldown_year()
{
    print'<select name="year">';
    print'<option calue="2017">2017</option>';
    print'<option calue="2018">2018</option>';
    print'<option calue="2019">2019</option>';
    print'<option calue="2020">2020</option>';
    print'</select>';
}

function pulldown_month()
{
    print'<select name="month">';
    print'<option calue="01">01</option>';
    print'<option calue="02">02</option>';
    print'<option calue="03">03</option>';
    print'<option calue="04">04</option>';
    print'<option calue="05">05</option>';
    print'<option calue="06">06</option>';
    print'<option calue="07">07</option>';
    print'<option calue="08">08</option>';
    print'<option calue="09">09</option>';
    print'<option calue="10">10</option>';
    print'<option calue="11">11</option>';
    print'<option calue="12">12</option>';
    print'</select>';
}

function pulldown_day()
{
    print'<select name="day">';
    print'<option calue="01">01</option>';
    print'<option calue="02">02</option>';
    print'<option calue="03">03</option>';
    print'<option calue="04">04</option>';
    print'<option calue="05">05</option>';
    print'<option calue="06">06</option>';
    print'<option calue="07">07</option>';
    print'<option calue="08">08</option>';
    print'<option calue="09">09</option>';
    print'<option calue="10">10</option>';
    print'<option calue="11">11</option>';
    print'<option calue="12">12</option>';
    print'<option calue="13">13</option>';
    print'<option calue="14">14</option>';
    print'<option calue="15">15</option>';
    print'<option calue="16">16</option>';
    print'<option calue="17">17</option>';
    print'<option calue="18">18</option>';
    print'<option calue="19">19</option>';
    print'<option calue="20">20</option>';
    print'<option calue="21">21</option>';
    print'<option calue="22">22</option>';
    print'<option calue="23">23</option>';
    print'<option calue="02">24</option>';
    print'<option calue="25">25</option>';
    print'<option calue="26">26</option>';
    print'<option calue="27">27</option>';
    print'<option calue="28">28</option>';
    print'<option calue="29">29</option>';
    print'<option calue="30">30</option>';
    print'<option calue="31">31</option>';
    print'</select>';
}

?>