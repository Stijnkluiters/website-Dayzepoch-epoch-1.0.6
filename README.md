Written in Symfony 3.2

**Dayz epoch website 1.0.6**

Currently contains

-**Rules page**
-**Traderitem list**
-**Homepage**
-**SQF to SQL importer**

In the back_end default controller go to the protected function string.

Add any products there. 

IMPORTANT that you remove any comments, classes that you dont want to import. also
- ItemSilverBar
- ItemGoldBar
- ItemGoldBar10oz
- itemGoldcase100oz
- ItemsSilverBar10oz 
Should also not be included, bug in code.. weird bug!

How to import a single product?

*Example:*
`
	class FoodDogCooked {type = "trade_items";buy[] ={1,"ItemGoldBar"};sell[] ={1,"ItemGoldBar"};};`


progress stopped duo owner of IDP(81.19.216.113:2300) doesn't want to pay money for a webhoster... Feel free to complete the rest of the code.

created by Chargedlight1

creating schema's by:
 php bin/console doctrine:schema:update --force
Create getters and setters in model:
 php bin/console doctrine:generate:entities AppBundle/Entity/{Product}
 start localhost by:
 php bin/console server:run"# laststandepoch" 
