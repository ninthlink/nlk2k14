# NL2K14
WordPress theme for http://www.ninthlink.com currently as a Child Theme of [Salient](http://www.salienttheme.com/)

Currently working with Salient 7.5.02?

### Theme Versioning

Lets just say, whatever date you are editing something, set the Version in the top of the main [style.css](https://github.com/ninthlink/nlk2k14/blob/master/style.css) to that? Maybe?

```
/*
Theme Name: NL2K14
...
Template: salient
Version: 2016.10.12
*/
````

### Branching and Deployment

Feature branching should branch off of **master**

Currently, **production** branch is set to deploy automatically through DeployBot to ~~live~~ the new Pantheon dev site, which should work as long as that Pantheon dev site is in SFTP mode.

[![Deployment status from DeployBot](https://nlk.deploybot.com/badge/56046447893432/87413.svg)](https://nlk.deploybot.com/96836/environments/87413)

From there, [use the Pantheon workflow](https://pantheon.io/docs/pantheon-workflow/) to migrate changes up to TST and Production http://www.ninthlink.com/

