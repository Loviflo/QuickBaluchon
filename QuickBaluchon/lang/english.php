<?php
$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<site>
    <headers>
        <header>
            <item1>Item 1</item1>
            <item2>Item 2</item2>
            <item3>Item 3</item3>
            <item4>Item 4</item4>
            <item5>Item 5</item5>
            <itemLogIn>
                <title>LogIn</title>
                <client>Customer</client>
                <deliveryman>Deliveryman</deliveryman>
            </itemLogIn>
            <itemSignIn>
                <title>Sign In</title>
                <client>Customer</client>
                <deliveryman>Deliveryman</deliveryman>
            </itemSignIn>
            <itemClientSpace>
                <client>Customer account</client>
                <deliveryman>Deliveryman account</deliveryman>
                <staff>Staff account</staff>
            </itemClientSpace>
            <itemDisconnect>Disconnect</itemDisconnect>
        </header>
        <headerStaff>
            <item1>Customer account management</item1>
            <item2>Deliveryman account management</item2>
            <item3>Application management</item3>
            <item4>Item 4</item4>
            <item5>Item 5</item5>
            <staffSpace>Staff account</staffSpace>
            <itemDisconnect>Disconnect</itemDisconnect>
        </headerStaff>
    </headers>
    <footer>
        <contact>
            <title>Contact-us</title>
            <buttonName>Contact</buttonName>
        </contact>
        <copyright>
            <title>© 2021 Copyright :</title>
            <linkName>SPS</linkName>
        </copyright>
        <staffLogIn>
            <buttonName>Login staff</buttonName>
            <form>
                <usernameInput>
                    <title>Username</title>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </usernameInput>
                <passwordInput>
                    <title>Password</title>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </passwordInput>
                <validation>Login</validation>
            </form>
        </staffLogIn>
    </footer>
    <pagesClientSide>
        <index>
            <pageTitle>Home page</pageTitle>
            <title>Home</title>
            <subtitle>This is a subtitle</subtitle>
            <text></text>
        </index>
        <logInClient>
            <pageTitle>Login page - Customer</pageTitle>
            <title>Login to your customer account</title>
            <form>
                <usernameInput>
                    <title>Company name</title>
                    <placeholder>Name...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </usernameInput>
                <passwordInput>
                    <title>Password</title>
                    <placeholder>Password...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </passwordInput>
                <validation>Send</validation>
            </form>
        </logInClient>
        <logInDeliveryman>
            <pageTitle>Login page - Deliveryman</pageTitle>
            <title>Login to your deliveryman account</title>
            <form>
                <usernameInput>
                    <title>Your name</title>
                    <placeholder>Name...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </usernameInput>
                <passwordInput>
                    <title>Password</title>
                    <placeholder>Password...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </passwordInput>
                <validation>Send</validation>
            </form>
        </logInDeliveryman>
        <signInClient>
            <pageTitle>Sign in - Customer</pageTitle>
            <title>Creation of customer account</title>
            <form>
                <usernameInput>
                    <title>Company name</title>
                    <placeholder>Name...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </usernameInput>
                <passwordInput>
                    <title>Password</title>
                    <placeholder>Password...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </passwordInput>
                <passwordInputVerification>
                    <title>Password Confirmation</title>
                    <placeholder>Password Confirmation...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </passwordInputVerification>
                <emailInput>
                    <title>Mail</title>
                    <placeholder>Mail...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </emailInput>
                <siretNumberInput>
                    <title>SIRET number</title>
                    <placeholder>SIRET...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </siretNumberInput>
                <motivesInput>
                    <title>Your motivations</title>
                    <placeholder>Motivations...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </motivesInput>
                <validation>Send</validation>
            </form>
        </signInClient>
        <signInDeliveryman>
            <pageTitle>Sign in page - Deliveryman</pageTitle>
            <title>Creation of deliveryman account</title>
            <form>
                <usernameInput>
                    <title>Username</title>
                    <placeholder>Name...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </usernameInput>
                <passwordInput>
                    <title>Password</title>
                    <placeholder>Password...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </passwordInput>
                <passwordInputVerification>
                    <title>Password Confirmation</title>
                    <placeholder>Password Confirmation...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </passwordInputVerification>
                <emailInput>
                    <title>Mail</title>
                    <placeholder>Mail...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Incorrect value</invalid>
                </emailInput>
                <fileInput>
                    <title>Your CV</title>
                </fileInput>
                <validation>Send</validation>
            </form>
        </signInDeliveryman>
        <clientSpace>
            <pageTitle>Customer space</pageTitle>
            <title>Customer space</title>
        </clientSpace>
        <deliverymanSpace>
            <pageTitle>Deliveryman space</pageTitle>
            <title>Deliveryman space</title>
        </deliverymanSpace>
    </pagesClientSide>
    <pagesAdminSide>
        <staffAccount>
            <pageTitle>Staff account</pageTitle>
            <title>Staff space</title>
        </staffAccount>
        <clientAccountsManagement>
            <pageTitle>Customer account management</pageTitle>
            <title>Customer account management</title>
            <table>
                <th1>Company name</th1>
                <th2>Actions</th2>
                <modal>
                    <title>Account deletion</title>
                    <text>Are you sure you want to delete this account ?</text>
                    <cancelButton>Cancel</cancelButton>
                    <confirmButton>Confirm</confirmButton>
                </modal>
            </table>
        </clientAccountsManagement>
        <clientAccountManagement>
            <pageTitle>Customer account management</pageTitle>
            <title>Account management</title>
            <card>
                <username>Company name: </username>
                <mail>Mail : </mail>
                <billingAddress>Billing address : </billingAddress>
                <siretNumber>SIRET number : </siretNumber>
                <motives>Motivations : </motives>
            </card>
        </clientAccountManagement>
        <deliverymanAccountsManagement>
            <pageTitle>Deliveryman account management</pageTitle>
            <title>Deliveryman account management</title>
            <table>
                <th1>Username</th1>
                <th2>Actions</th2>
                <modal>
                    <title>Account deletion</title>
                    <text>Are you sure you want to delete this account ?</text>
                    <cancelButton>Cancel</cancelButton>
                    <confirmButton>Confirm</confirmButton>
                </modal>
            </table>
        </deliverymanAccountsManagement>
        <deliverymanAccountManagement>
            <pageTitle>Deliveryman account management</pageTitle>
            <title>Account management</title>
            <card>
                <username>Username : </username>
                <mail>Mail : </mail>
                <deliveryDistance>Delivery distance : </deliveryDistance>
                <kilometersNumber>Number of kilometers : </kilometersNumber>
                <packagesNumber>Number of packages : </packagesNumber>
                <IBAN>IBAN : </IBAN>
                <vehicleType>Vehicle type : </vehicleType>
                <vehicleBrand>Vehicle brand : </vehicleBrand>
                <vehicleCapacity>Vehicle capacity : </vehicleCapacity>
            </card>
        </deliverymanAccountManagement>
        <applicationManagement>
            <pageTitle>Application management</pageTitle>
            <title>Application management</title>
            <subtitle1>Clients</subtitle1>
            <subtitle2>Deliverymen</subtitle2>
            <table>
                <th1>Username</th1>
                <th2>Actions</th2>
                <modal>
                    <title>Account deletion</title>
                    <text>Are you sure you want to delete this account ?</text>
                    <cancelButton>Cancel</cancelButton>
                    <confirmButton>Confirm</confirmButton>
                </modal>
            </table>
        </applicationManagement>
    </pagesAdminSide>
</site>
XML;
?>