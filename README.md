# JPG.Login

TYPO3.Flow Package which shows by Tutorial-style commits how to make a Login- / "Login with"-Function

## What happens here

All the notes written here can also be found in the commit notes.

### First Commit [544b96d7819ee8393960d4ca82021ca538a88f0f](https://github.com/jgreth/JPG.Login/commit/544b96d7819ee8393960d4ca82021ca538a88f0f)

Initial Code generated by Kickstarter.
Generated using:
./flow kickstart:actioncontroller --generate-actions --generate-related --generate-templates JPG.Login Secret

Code differes a bit from normal generated Code, cause I use a modified version of the Kickstarter (https://github.com/jgreth/TYPO3.Kickstart) , which makes nicer Twitter bootstrap templates and allready a menu for all actions.
To get the same results assure you have in your flow/composer.json (and installed):
```json
{
    [...]
    "config": {
        [...]
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/jgreth/TYPO3.Kickstart.git"
        }
    ],
    "require": {
        "typo3/flow": "2.1.*",
        [...]
        "typo3/twitter-bootstrap": "dev-master",
        "hfrahmann/opauth": "@dev"
    },
    "require-dev": {
        "typo3/kickstart": "dev-master",
        [...]
    },
    [...]
}
```

The "hfrahmann/opauth" Package i just installed for later use of OAuth login via Google, Twitter, Facebook... ("Sign In with..."-Function) but is not needed yet.
