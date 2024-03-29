# JPG.Login

TYPO3.Flow Package which shows by Tutorial-style commits how to make a Login- / "Login with"-Function

## What happens here

All the notes written here can also be found in the commit notes.

### First Commit [c163ee83790e335da1150d6b17c12aaebb193a79](https://github.com/jgreth/JPG.Login/commit/c163ee83790e335da1150d6b17c12aaebb193a79)

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


### Second Commit [bd0dce3c14fdf94e64fdfb2cc42588c946a66be5](https://github.com/jgreth/JPG.Login/commit/bd0dce3c14fdf94e64fdfb2cc42588c946a66be5)

#### Activate security stuff
In Anlehnung an: http://www.layh.com/work/typo3-flow-typo3-fluid/tutorials/flow-registration-and-login.html

Activate the default password and username provider in Settings.yaml file of Package.
The authenticationStrategy is oneToken => one Token has to be authenticated to grant access.
The default provider for the authentication is PersistedUsernamePasswordProvider.

##### Settings.yaml
```yaml
TYPO3:
  Flow:
    security:
      enable: TRUE
      authentication:
        #oneToken atLeastOneToken anyToken - more info see: http://docs.typo3.org/flow/TYPO3FlowDocumentation/TheDefinitiveGuide/PartIII/Security.html#multi-factor-authentication-strategy
        authenticationStrategy: oneToken
        providers:
          DefaultProvider:
            provider: PersistedUsernamePasswordProvider
```

##### Policy.yaml
```yaml
##http://docs.typo3.org/flow/TYPO3FlowDocumentation/TheDefinitiveGuide/PartIII/Security.html#access-control-lists
##TYPO3 Flow will always add the magic Everybody role, which you don't have to configure yourself. This role will also be present, if no account is authenticated.
##Likewise, the magic role Anonymous is added to the security context if a user is not authenticated.
##Admin hat alle Eigenschaften der Rolle User + die Admin Eigenschaften
roles:
  User: []
  Admin: ['User']
```

##### Flow: Routes.yaml
```yaml
#Subroutes from the Adress package.
-
  name: 'Logintut'
  uriPattern: '<LoginSubroutes>'
  defaults:
    '@format': 'html'
  subRoutes:
    LoginSubroutes:
      package: 'JPG.Login'
```

##### Package: Routes.yaml
```yaml
-
  name: 'Login Application Index'
  uriPattern: 'login'
  defaults:
    '@package': 'JPG.Login'
    '@controller': 'Secret'
    '@action': 'index'
    '@format': 'html'
```
