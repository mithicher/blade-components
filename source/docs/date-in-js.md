---
title: Date in Javascript
description: Date in Javascript
extends: _layouts.documentation
section: content
---

# Date in Javascript {#date-in-javascript}


### Show current date and time

```js
new Date()
```

[https://css-tricks.com/everything-you-need-to-know-about-date-in-javascript/](https://css-tricks.com/everything-you-need-to-know-about-date-in-javascript/)

```js
// ISO 8601 Extended format
YYYY-MM-DDTHH:mm:ss.sssZ
```

- ```YYYY``` : 4-digit year
- ```MM``` : 2-digit month (where January is 01 and December is 12)
- ```DD``` : 2-digit date (0 to 31)
- ```-``` : Date delimiters
- ```T``` : Indicates the start of time
- ```HH``` : 24-digit hour (0 to 23)
- ```mm``` : Minutes (0 to 59)
- ```ss``` : Seconds (0 to 59)
- ```sss``` : Milliseconds (0 to 999)
- ```:``` : Time delimiters
- ```Z``` : If Z is present, date will be set to UTC. If Z is not present, it’ll be Local Time. (This only applies if time is provided.)

### Format date in JS

The native Date object comes with seven formatting methods.

```js
const date = new Date(2019, 0, 23, 17, 23, 42)
```

- ```toString``` gives you ```Wed Jan 23 2019 17:23:42 GMT+0800 (Singapore Standard Time)```
- ```toDateString``` gives you ```Wed Jan 23 2019```
- ```toLocaleString``` gives you ```23/01/2019, 17:23:42```
- ```toLocaleDateString``` gives you ```23/01/2019```
- ```toGMTString``` gives you ```Wed, 23 Jan 2019 09:23:42 GMT```
- ```toUTCString``` gives you ```Wed, 23 Jan 2019 09:23:42 GMT```
- ```toISOString``` gives you ```2019-01-23T09:23:42.079Z```

### Create a custom date format

Lets create a custom date format like ```Thu, 20 Aug 2020```.

```js
const d = new Date();

const year = d.getFullYear(); // gives 2020
const date = d.getDate(); // gives 20
```

> Javascript Date Month is zero-indexed.

```js
const d = new Date();

const year = d.getFullYear(); // gives 2020
const date = d.getDate(); // gives 20

const months = [
	'January',
	'February',
	'March',
	'April',
	'May',
	'June',
	'July',
	'August',
	'September',
	'October',
	'November',
	'December'
];

const monthIndex = d.getMonth();
const monthName = months[monthIndex]; // August

const days = [
	'Sun',
	'Mon',
	'Tue',
	'Wed',
	'Thu',
	'Fri',
	'Sat'
];

const dayIndex = d.getDay();
const dayName = days[dayIndex] // Thu

const formatted = `${dayName}, ${date} ${monthName} ${year}`
console.log(formatted) // Thu, 20 August 2019
```




