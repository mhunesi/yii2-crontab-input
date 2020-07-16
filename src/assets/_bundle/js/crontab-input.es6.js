var CronTabInput = {
    generateDescription : function () {


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
                this.cronExpression = '* * * * *';
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
}