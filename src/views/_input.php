<?php
/**
 * (developer comment)
 *
 * @link http://www.mustafaunesi.com.tr/
 * @copyright Copyright (c) 2020 Polimorf IO
 * @product PhpStorm.
 * @author : Mustafa Hayri ÜNEŞİ <mhunesi@gmail.com>
 * @date: 2020-07-09
 * @time: 15:27
 * @var $el string
 *
 */
use mhunesi\crontab\input\CrontabInput;
?>

<div class="card cron-card" id="<?= $el ?>">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
            <li v-if="tabs.minutes" class="nav-item">
                <a class="nav-link" v-bind:class="[type === 'minutes' ? 'active' : '']" v-on:click="type='minutes'"><?= CrontabInput::t('Minutes') ?></a>
            </li>
            <li v-if="tabs.hourly" class="nav-item">
                <a class="nav-link" v-bind:class="[type === 'hourly' ? 'active' : '']"
                   v-on:click="type='hourly'"><?= CrontabInput::t('Hourly') ?></a>
            </li>
            <li v-if="tabs.daily" class="nav-item">
                <a class="nav-link" v-bind:class="[type === 'daily' ? 'active' : '']"
                   v-on:click="type='daily'"><?= CrontabInput::t('Daily') ?></a>
            </li>
            <li v-if="tabs.weekly" class="nav-item">
                <a class="nav-link" v-bind:class="[type === 'weekly' ? 'active' : '']"
                   v-on:click="type='weekly'"><?= CrontabInput::t('Weekly') ?></a>
            </li>
            <li v-if="tabs.monthly" class="nav-item">
                <a class="nav-link" v-bind:class="[type === 'monthly' ? 'active' : '']" v-on:click="type='monthly'"><?= CrontabInput::t('Monthly') ?></a>
            </li>
            <li v-if="tabs.yearly" class="nav-item">
                <a class="nav-link" v-bind:class="[type === 'yearly' ? 'active' : '']"
                   v-on:click="type='yearly'"><?= CrontabInput::t('Yearly') ?></a>
            </li>
            <li v-if="tabs.advanced" class="nav-item">
                <a class="nav-link" v-bind:class="[type === 'advanced' ? 'active' : '']" v-on:click="type='advanced'"><?= CrontabInput::t('Advanced') ?></a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="tab-content mt-3">
                    <div v-if="tabs.minutes" class="tab-pane" v-bind:class="[type === 'minutes' ? 'active' : '']">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label"><?= CrontabInput::t('Every') ?></label>
                            </div>
                            <div class="col-auto">
                                <select class="form-control" v-model="minutes.minuteInterval">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <label class="col-form-label"><?= CrontabInput::t('minute(s)') ?></label>
                            </div>

                        </div>
                    </div>

                    <div v-if="tabs.hourly" class="tab-pane" v-bind:class="[type === 'hourly' ? 'active' : '']">
                        <div class="form-inline ">
                            <label class="form-check-label">
                                <input class="form-check-input mb-1" type="radio" value="every" v-model="hourly.radio"/>
                                <?= CrontabInput::t('Every') ?>
                                <select class="form-control ml-1 mr-1" v-model="hourly.everyHourInterval">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="8">8</option>
                                    <option value="12">12</option>
                                </select> <?= CrontabInput::t('hour(s)') ?></label>
                        </div>

                        <div class="form-inline mt-3">
                            <label class="form-check-label">
                                <input class="form-check-input mb-1" type="radio" value="start" v-model="hourly.radio">
                                <?= CrontabInput::t('Starts at') ?>
                                <div class="form-inline ">
                                    <select class="form-control mr-1 ml-1" v-model="hourly.hourInterval">
                                        <option value="0">00</option>
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                        <option value="7">07</option>
                                        <option value="8">08</option>
                                        <option value="9">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                    </select>
                                    :
                                    <select class="form-control ml-1" v-model="hourly.minuteInterval">
                                        <option value="0">00</option>
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                        <option value="7">07</option>
                                        <option value="8">08</option>
                                        <option value="9">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                        <option value="51">51</option>
                                        <option value="52">52</option>
                                        <option value="53">53</option>
                                        <option value="54">54</option>
                                        <option value="55">55</option>
                                        <option value="56">56</option>
                                        <option value="57">57</option>
                                        <option value="58">58</option>
                                        <option value="59">59</option>
                                    </select>
                                </div>


                            </label>
                        </div>
                    </div>

                    <div v-if="tabs.daily" class="tab-pane" v-bind:class="[type === 'daily' ? 'active' : '']">
                        <div class="form-inline ">
                            <label class="form-check-label">
                                <input class="form-check-input mb-1" type="radio" value="every-day"
                                       v-model="daily.radio"/><?= CrontabInput::t('Everyday') ?></label>
                        </div>

                        <div class="form-inline mt-3">
                            <label class="form-check-input">
                                <input class="form-check-input mb-1" type="radio" value="every-weekday"
                                       v-model="daily.radio"><?= CrontabInput::t('Every weekday') ?></label>
                        </div>

                        <div class="form-inline mt-1">
                            <?= CrontabInput::t('Starts at') ?> :

                            <div class="form-inline ">
                                <select class="form-control mr-1 ml-1" v-model="daily.hourInterval">
                                    <option value="0">00</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select>
                                :
                                <select class="form-control ml-1" v-model="daily.minuteInterval">
                                    <option value="0">00</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                </select>
                            </div>
                        </div>


                    </div>

                    <div v-if="tabs.weekly" class="tab-pane" v-bind:class="[type === 'weekly' ? 'active' : '']">
                        <div class="row">
                            <div class="col-2">
                                <div class="form-inline ">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" v-model="weekly.days"
                                               value="MON"/>
                                        <?= CrontabInput::t('Monday') ?>
                                    </label>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-inline ">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input ml-2" v-model="weekly.days"
                                               value="TUE"/>
                                        <?= CrontabInput::t('Tuesday') ?>
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-inline ">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input ml-4" v-model="weekly.days"
                                               value="WED"/>
                                        <?= CrontabInput::t('Wednesday') ?>
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-inline ">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input ml-5" v-model="weekly.days"
                                               value="THU"/>
                                        <?= CrontabInput::t('Thursday') ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-2">
                                <div class="form-inline ">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" v-model="weekly.days"
                                               value="FRI"/>
                                        <?= CrontabInput::t('Friday') ?>
                                    </label>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-inline ">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input ml-2" v-model="weekly.days"
                                               value="SAT"/>
                                        <?= CrontabInput::t('Saturday') ?>
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-inline ">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input ml-4" v-model="weekly.days"
                                               value="SUN"/>
                                        <?= CrontabInput::t('Sunday') ?>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-inline mt-2">
                            <?= CrontabInput::t('Starts at') ?> :

                            <div class="form-inline ">
                                <select class="form-control mr-1 ml-1" v-model="weekly.hours">
                                    <option value="0">00</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select>
                                :
                                <select class="form-control ml-1" v-model="weekly.minutes">
                                    <option value="0">00</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div v-if="tabs.monthly" class="tab-pane" v-bind:class="[type === 'monthly' ? 'active' : '']">

                        <div class="form-inline">
                            <label class="form-check-label">
                                <input class="form-check-input mb-1" type="radio" v-model="monthly.radio" value="day"/>
                                <?= CrontabInput::t('monthly.day.select.left') ?>
                                <select class="form-control ml-1 mr-1" v-model="monthly.day">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <?= CrontabInput::t('monthly.day.select.right') ?>
                                <select class="form-control ml-1 mr-1" v-model="monthly.month">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                </select>
                                <?= CrontabInput::t('monthly.month.select.right') ?>
                        </div>

                        <div class="form-inline mt-3">
                            <label class="form-check-label">
                                <input class="form-check-input mb-1" type="radio" v-model="monthly.radio" value="the">
                                <?= CrontabInput::t('monthly.dayName.select.left') ?>
                                <select class="form-control ml-1 mr-1" v-model="monthly.rank">
                                    <option value="1"><?= CrontabInput::t('First') ?></option>
                                    <option value="2"><?= CrontabInput::t('Second') ?></option>
                                    <option value="3"><?= CrontabInput::t('Third') ?></option>
                                    <option value="4"><?= CrontabInput::t('Fourth') ?></option>
                                </select>
                                <select class="form-control ml-1 mr-1" v-model="monthly.dayName">
                                    <option value="MON"><?= CrontabInput::t('Monday') ?></option>
                                    <option value="TUE"><?= CrontabInput::t('Tuesday') ?></option>
                                    <option value="WED"><?= CrontabInput::t('Wednesday') ?></option>
                                    <option value="THU"><?= CrontabInput::t('Thursday') ?></option>
                                    <option value="FRI"><?= CrontabInput::t('Friday') ?></option>
                                    <option value="SAT"><?= CrontabInput::t('Saturday') ?></option>
                                    <option value="SUN"><?= CrontabInput::t('Sunday') ?></option>
                                </select>
                                <?= CrontabInput::t('monthly.dayName.select.right') ?>

                                <select class="form-control ml-1 mr-1" v-model="monthly.month">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                </select>
                                <?= CrontabInput::t('monthly.month.select.right') ?></label>

                        </div>


                        <div class="form-inline mt-2">
                            <?= CrontabInput::t('Starts at') ?>:

                            <div class="form-inline ">
                                <select class="form-control mr-1 ml-1" v-model="monthly.hours">
                                    <option value="0">00</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select>
                                :
                                <select class="form-control ml-1" v-model="monthly.minutes">
                                    <option value="0">00</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div v-if="tabs.yearly" class="tab-pane" v-bind:class="[type === 'yearly' ? 'active' : '']">

                        <div class="form-inline ">
                            <label class="form-check-label mr-1">
                                <input class="form-check-input mb-1" type="radio" value="every" v-model="yearly.radio"/>
                                <?= CrontabInput::t('yearly.month.select.left') ?></label>
                            <select class="form-control mr-1" v-model="yearly.month">
                                <option value="1"><?= CrontabInput::t('January') ?></option>
                                <option value="2"><?= CrontabInput::t('February') ?></option>
                                <option value="3"><?= CrontabInput::t('March') ?></option>
                                <option value="4"><?= CrontabInput::t('April') ?></option>
                                <option value="5"><?= CrontabInput::t('May') ?></option>
                                <option value="6"><?= CrontabInput::t('June') ?></option>
                                <option value="7"><?= CrontabInput::t('July') ?></option>
                                <option value="8"><?= CrontabInput::t('August') ?></option>
                                <option value="9"><?= CrontabInput::t('September') ?></option>
                                <option value="10"><?= CrontabInput::t('October') ?></option>
                                <option value="11"><?= CrontabInput::t('November') ?></option>
                                <option value="12"><?= CrontabInput::t('December') ?></option>
                            </select>
                            <?= CrontabInput::t('yearly.day.select.left') ?>

                            <select class="form-control ml-2" v-model="yearly.day">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <?= CrontabInput::t('yearly.day.select.right') ?>
                        </div>

                        <div class="form-inline mt-3">
                            <label class="form-check-label">
                                <input class="form-check-input mb-1" type="radio" value="the" v-model="yearly.radio">
                                <?= CrontabInput::t('yearly.dayName.select.left') ?>
                                <select class="form-control ml-1 mr-1" v-model="yearly.rank">
                                    <option value="1"><?= CrontabInput::t('First') ?></option>
                                    <option value="2"><?= CrontabInput::t('Second') ?></option>
                                    <option value="3"><?= CrontabInput::t('Third') ?></option>
                                    <option value="4"><?= CrontabInput::t('Fourth') ?></option>
                                </select>
                                <select class="form-control ml-1 mr-1" v-model="yearly.dayName">
                                    <option value="MON"><?= CrontabInput::t('Monday') ?></option>
                                    <option value="TUE"><?= CrontabInput::t('Tuesday') ?></option>
                                    <option value="WED"><?= CrontabInput::t('Wednesday') ?></option>
                                    <option value="THU"><?= CrontabInput::t('Thursday') ?></option>
                                    <option value="FRI"><?= CrontabInput::t('Friday') ?></option>
                                    <option value="SAT"><?= CrontabInput::t('Saturday') ?></option>
                                    <option value="SUN"><?= CrontabInput::t('Sunday') ?></option>
                                </select>
                                <?= CrontabInput::t('yearly.dayName.select.right') ?>
                            </label>
                            <select class="form-control ml-1" v-model="yearly.month">
                                <option value="1"><?= CrontabInput::t('January') ?></option>
                                <option value="2"><?= CrontabInput::t('February') ?></option>
                                <option value="3"><?= CrontabInput::t('March') ?></option>
                                <option value="4"><?= CrontabInput::t('April') ?></option>
                                <option value="5"><?= CrontabInput::t('May') ?></option>
                                <option value="6"><?= CrontabInput::t('June') ?></option>
                                <option value="7"><?= CrontabInput::t('July') ?></option>
                                <option value="8"><?= CrontabInput::t('August') ?></option>
                                <option value="9"><?= CrontabInput::t('September') ?></option>
                                <option value="10"><?= CrontabInput::t('October') ?></option>
                                <option value="11"><?= CrontabInput::t('November') ?></option>
                                <option value="12"><?= CrontabInput::t('December') ?></option>
                            </select>
                            <?= CrontabInput::t('yearly.month.select.right') ?>

                        </div>


                        <div class="form-inline mt-2">
                            <?= CrontabInput::t('Starts at') ?> :

                            <div class="form-inline ">
                                <select class="form-control mr-1 ml-1" v-model="yearly.hours">
                                    <option value="0">00</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select>
                                :
                                <select class="form-control ml-1" v-model="yearly.minutes">
                                    <option value="0">00</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div v-if="tabs.advanced" class="tab-pane" v-bind:class="[type === 'advanced' ? 'active' : '']">
                        <div class="form-inline">
                            <input type="text" class="manuel-input ml-1" v-model="advanced.manuelExp">
                        </div>

                        <div class="part-explanation">
                            <p class="cron-parts">
                            <div>
                                <span class="clickable"><?= CrontabInput::t('minute') ?></span></div>
                            <div><span class="clickable"><?= CrontabInput::t('hour') ?></span></div>
                            <div><span class="clickable"><?= CrontabInput::t('day') ?></span><br>(<?= CrontabInput::t('month') ?>)</div>
                            <div><span class="clickable"><?= CrontabInput::t('month') ?></span></div>
                            <div><span class="clickable"><?= CrontabInput::t('day') ?></span><br>(<?= CrontabInput::t('week') ?>)</div>
                            </p>
                            <table>
                                <tbody>
                                <tr>
                                    <th>*</th>
                                    <td><?= CrontabInput::t('any value') ?></td>
                                </tr>
                                <tr>
                                    <th>,</th>
                                    <td><?= CrontabInput::t('value list separator') ?></td>
                                </tr>
                                <tr>
                                    <th>-</th>
                                    <td><?= CrontabInput::t('range of values') ?></td>
                                </tr>
                                <tr>
                                    <th>/</th>
                                    <td><?= CrontabInput::t('step values') ?></td>
                                </tr>
                                </tbody>
                                <tbody style="display: none">
                                <tr>
                                    <th>0-59</th>
                                    <td><?= CrontabInput::t('allowed values') ?></td>
                                </tr>
                                </tbody>
                                <tbody style="display: none">
                                <tr>
                                    <th>0-23</th>
                                    <td><?= CrontabInput::t('allowed values') ?></td>
                                </tr>
                                </tbody>
                                <tbody style="display: none">
                                <tr>
                                    <th>1-31</th>
                                    <td><?= CrontabInput::t('allowed values') ?></td>
                                </tr>
                                </tbody>
                                <tbody style="display: none">
                                <tr>
                                    <th>1-12</th>
                                    <td><?= CrontabInput::t('allowed values') ?></td>
                                </tr>
                                <tr>
                                    <th>JAN-DEC</th>
                                    <td><?= CrontabInput::t('alternative single values') ?></td>
                                </tr>
                                </tbody>
                                <tbody style="display: none">
                                <tr>
                                    <th>0-6</th>
                                    <td><?= CrontabInput::t('allowed values') ?></td>
                                </tr>
                                <tr>
                                    <th>SUN-SAT</th>
                                    <td><?= CrontabInput::t('alternative single values') ?></td>
                                </tr>
                                <tr>
                                    <th>7</th>
                                    <td><?= CrontabInput::t('sunday (non-standard)') ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="alert alert-info" role="alert">
                    <p class="text-center"><?= CrontabInput::t('Next Scheduled Dates') ?></p>
                    <ol>
                        <li v-for="date in nextDates">
                            {{ date }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer text-center">
        <h6 class="card-subtitle result-subtitle mt-1">{{generateDescription}}</h6>
    </div>
</div>

