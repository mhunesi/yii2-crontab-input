var CronTabInput = {
    generateDescription: function () {
        switch (this.type) {
            case "minutes":
                this.cronExpression = `*/${this.minutes.minuteInterval} * * * *`;
                break;

            case "hourly":
                if (this.hourly.radio === "every") {
                    this.cronExpression = `0 */${this.hourly.everyHourInterval} * * *`;
                }
                if (this.hourly.radio === "start") {
                    this.cronExpression = `${this.hourly.minuteInterval} ${this.hourly.hourInterval} * * *`;
                }
                break;

            case "daily":
                if (this.daily.radio === "every-day") {
                    this.cronExpression = `${this.daily.minuteInterval} ${this.daily.hourInterval} 1/${this.daily.dayInterval} * *`;
                }
                if (this.daily.radio === "every-weekday") {
                    this.cronExpression = `${this.daily.minuteInterval} ${this.daily.hourInterval} * * MON-FRI`;
                }
                break;

            case "weekly":
                if (this.weekly.days.length > 0) {
                    this.cronExpression = (
                        `${this.weekly.minutes} ${this.weekly.hours} * * ` +
                        `${this.weekly.days
                            .filter(function (d) {
                                return d;
                            })
                            .sort()
                            .join()}`
                    );
                } else {
                    this.cronExpression = (
                        `${this.weekly.minutes} ${this.weekly.hours} * * *`
                    );
                }
                break;

            case "monthly":
                if (this.monthly.radio === 'day') {
                    this.cronExpression = `${this.monthly.minutes} ${this.monthly.hours} ${this.monthly.day} 1/${this.monthly.month} *`;
                }

                if (this.monthly.radio === 'the') {
                    this.cronExpression = `${this.monthly.minutes} ${this.monthly.hours} * 1/${this.monthly.month} ${this.monthly.dayName}#${this.monthly.rank}`;
                }
                break;

            case "yearly":
                if (this.yearly.radio === 'every') {
                    this.cronExpression = `${this.yearly.minutes} ${this.yearly.hours} ${this.yearly.day} ${this.yearly.month} *`;
                }

                if (this.yearly.radio === 'the') {
                    this.cronExpression = `${this.yearly.minutes} ${this.yearly.hours} * ${this.yearly.month} ${this.yearly.dayName}#${this.yearly.rank}`;
                }
                break;

            case "advanced":
                this.cronExpression = this.advanced.manuelExp;
                break;

            default :
                this.cronExpression = '*/1 * * * *';
                break;
        }


        try {
            moment.locale(this.language);
            let dates = [];
            later.schedule(later.parse.cron(this.cronExpression)).next(10).forEach(function (element) {
                dates.push(moment(new Date(element)).utc().format('LLLL'))
            });
            this.nextDates = dates;

            this.setInputValue();

            return cronstrue.toString(this.cronExpression, {locale: this.language});
        } catch (e) {
            this.nextDates = [e];
            return e;
        }

    },

    parseExpression: function () {
        var groups = null;
        if (!this.cronExpression) {
            return;
        }
        var expression = this.cronExpression;

        if (expression.split(" ").length != 5) {
            return {
                type: "advanced",
                cronExpression: expression
            };
        }
        if ((groups = expression.match(/^\*\/(\d+) \* \* \* \*$/))) {

            this.type = 'minutes';
            return this.minutes = {
                ...this.minutes, ...{
                    minuteInterval: Number(groups[1])
                }
            };
        }

        if ((groups = expression.match(/^(\d+) \*\/(\d+) \* \* \*$/))) {

            this.type = 'hourly';
            return this.hourly = {
                ...this.hourly, ...{
                    radio: "every",
                    minuteInterval: Number(groups[1]),
                    everyHourInterval: Number(groups[2])
                }
            };
        }

        if ((groups = expression.match(/^(\d+) (\d+) \* \* \*$/))) {

            this.type = 'hourly';
            return this.hourly = {
                ...this.hourly, ...{
                    radio: "start",
                    minuteInterval: Number(groups[1]),
                    hourInterval: Number(groups[2])
                }
            };
        }

        if ((groups = expression.match(/^(\d+) (\d+) 1\/(\d+) \* \*$/))) {
            this.type = 'daily';
            return this.daily = {
                ...this.daily, ...{
                    radio: "every-day",
                    minuteInterval: Number(groups[1]),
                    hourInterval: Number(groups[2]),
                    dayInterval: Number(groups[3])
                }
            };
        }

        if ((groups = expression.match(/^(\d+) (\d+) \* \* MON-FRI$/))) {
            this.type = 'daily';
            return this.daily = {
                ...this.daily, ...{
                    radio: "every-weekday",
                    minuteInterval: Number(groups[1]),
                    hourInterval: Number(groups[2])
                }
            };
        }

        if (
            (groups = expression.match(
                /^(\d+) (\d+) \* \* (\w+)(,\w+)?(,\w+)?(,\w+)?(,\w+)?(,\w+)?(,\w+)?$/
            ))
        ) {
            const optionalDaysBeginIndex = 4;
            const matchesEndIndex = 10;

            this.type = 'weekly';
            return this.weekly = {
                ...this.weekly, ...{
                    minutes: Number(groups[1]),
                    hours: Number(groups[2]),
                    days: [groups[3]].concat(
                        groups
                            .slice(optionalDaysBeginIndex, matchesEndIndex)
                            .map(d => d && d.replace(/,/, ""))
                            .filter(d => d)
                    )
                }
            };
        }


        if ((groups = expression.match(/^(\d+) (\d+) (\d+) 1\/(\d+) \*$/))) {

            this.type = 'monthly';
            return this.monthly = {
                ...this.monthly, ...{
                    radio: "day",
                    minutes: Number(groups[1]),
                    hours: Number(groups[2]),
                    day: Number(groups[3]),
                    month: Number(groups[4])
                }
            };
        }


        if ((groups = expression.match(/^(\d+) (\d+) \* 1\/(\d+) (\w+)\#(\d)$/))) {

            this.type = 'monthly';
            return this.monthly = {
                ...this.monthly, ...{
                    radio: "the",
                    minutes: Number(groups[1]),
                    hours: Number(groups[2]),
                    dayName: groups[4],
                    month: Number(groups[3]),
                    rank: Number(groups[5])
                }
            };
        }

        if ((groups = expression.match(/^(\d+) (\d+) (\d+) (\d+) \*$/))) {

            this.type = 'yearly';

            return this.yearly = {
                ...this.yearly, ...{
                    type: "yearly",
                    radio: "every",
                    minutes: Number(groups[1]),
                    hours: Number(groups[2]),
                    day: Number(groups[3]),
                    month: Number(groups[4])
                }
            };
        }

        if ((groups = expression.match(/^(\d+) (\d+) \* (\d+) (\w+)\#(\d)$/))) {
            this.type = 'yearly';

            return this.yearly = {
                ...this.yearly, ...{
                    type: "yearly",
                    radio: "the",
                    minutes: Number(groups[1]),
                    hours: Number(groups[2]),
                    dayName: groups[4],
                    month: Number(groups[3]),
                    rank: Number(groups[5])
                }
            };
        }

        this.type = 'advanced';
        this.advanced.manuelExp = expression
    }
};