# IOS

---

- [IOS App Intro](#section-1)
- [INSTALLATION](#section-2)
- [Thinkin Cab IOS User Application](#)
- [Thinkin Cab IOS Driver Application](#section-3)
- [Simulator](#section-4)
- [Device](#section-5)
- [Archiving](#section-6)


<a name="section-1"></a>
## IOS Thinkin Cab solution

To set the iOS app up, we need to download and install few framework that are used to
generate the Thinkin Cab iOS application.
you need a Mac computer (macOS 10.11.5 or later) running the latest version of Xcode.
Download the latest version of Xcode on your Mac free from the App Store.
To download the latest version of Xcode
1. Open the App Store app on your Mac (by default it’s in the Dock).
2. In the search field in the top-right corner, type Xcode and press the Return key.
3. The Xcode app shows up as the first search result.
4. Click Get and then click Install App.
5. Enter your Apple ID and password when prompted.
6. Xcode is downloaded into your /Applications directory.

<a name="section-2"></a>

####INSTALLATION
###Thinkin Cab User Application:
1. Extract the iOS zip file.
2. Open the Thinkin Cab User App in Xcode and wait till the app launches successfully.
3. On the project explorer window of Xcode, find and edit the following files

    a. In General ->Identity -> Bundle Identifier

        i. applicationId “com.thinkincab.user” -> change this to your app’s Bundle ID

        ii. Display name -> name of your app



    b. In the navigation area search for "/ThinkinCabSwift/AppData.swift" file (usually that may in Constant group)

    <img src="/docs/img3.png"></img>

        i. #define SERVICE_URL = "https://thinkincab.thinkindragon.com/"; 
        -> Change this to your app’s base URL.

        ii. #define appClientId = 2; -> Change this to your app’s client_id.

        iii. #define appSecretKey = "yVnKClKDHPcDlqqO1V05RtDRdvtrVHfvjlfasfdaa"; 
        -> Change this to your app’s client_secret.

        iv. #define stripePublishableKey= "pk_test_0G4SKYM246m8dK6kgayCPwKWTXy"; 
        -> Change this to your app’s Strip token.

        v. For map API and other google api key that 
        you get from the google developer console and attach the billing info

        vi. #define googleMapKey = @”Some key” -> change 
        this to your app’s google maps key that you get from the google maps console

4. Change the splash screen and icon for your own brand.
5. The theme color of the app should be change in the colors.h in the css group folder
inside the app ->#define BLACKCOLOR RGB(18, 18, 18) (give the RGB value of your theme color)

Open the project folder from the your mac and follow the below mentioned path: User-> user->Assets.xcassets
you must save the icons and splash screens in these folders according to the device size.
Now hit on the ‘run’ button the application will run successfully in the Simulator.
If you want to run the build in your device(iPhone) you must enroll in the apple developer
account to register your device

<a name="section-3"></a>
###Thinkin Cab Driver Application

Extract the iOS zip file.

Open the Thinkin Cab User App in Xcode and wait till the app launches successfully.

On the project explorer window of Xcode, find and edit the following files

    a. In General ->Identity -> Bundle Identifier
        i. applicationId “com.thinkincab.provider” -> change this to your app’ Bundle ID
        ii. Display name -> name of your app

    b. In the navigation area search for appdata.swift file (usually that may in services group)

<img src="/docs/img4.png"></img>

        i. #define SERVICE_URL = "https://thinkincab.thinkindragon.com/"; 
        -> Change this to your app’s base URL.

        ii. #define appClientId = 2; -> Change this to your app’s client_id.

        iii. #define appSecretKey = "yVnKClKDHPcDlqqO1V05RtDRdvtrVHfvjlfasfdaa"; 
        -> Change this to your app’s client_secret.

        iv. #define stripePublishableKey= "pk_test_0G4SKYM246m8dK6kgayCPwKWTXy"; 
        -> Change this to your app’s Strip token.

        v. For map API and other google api key that 
        you get from the google developer console and attach the billing info

        vi. #define googleMapKey = @”Some key” -> change 
        this to your app’s google maps key that you get from the google maps console


The theme color of the app should be change in the colors.h in the css group folder
inside the app ->#define BLACKCOLOR RGB(18, 18, 18) (give the RGB value of your theme
color)

Open the project folder from the your mac and follow the below mentioned path:
User-> user->Assets.xcassets

you must save the icons and splash screens in these folders according to the device size.
Now hit on the ‘run’ button the application will run successfully in the Simulator.
If you want to run the build in your device(iPhone) you must enroll in the apple developer
account to register your device

<a name="section-4">
###To run your app in the simulator</a>

1. In the Scheme pop-up menu in the Xcode toolbar, choose iPhone 11.
2. The Scheme pop-up menu lets you choose which simulator or device you’d like to run
your app on. Make sure you select the iPhone 11 Simulator, not an iOS device.
3. Click the Run button, located in the top-left corner of the Xcode toolbar.
4. Watch the Xcode toolbar as the build process completes.
5. Xcode displays messages about the build process in the activity viewer, which is in the
middle of the toolbar.
After Xcode finishes building your project, the simulator starts automatically. It may take a few
moments to start up the first time.
The simulator opens in the iPhone mode you specified and then launches your app. Initially, the
simulator displays your app’s launch screen, and then it transitions to your app’s main interface.
The launch image of your app can be change in the LaunchScreen.storyboard or add the
different size of launch images in the Assets.xcassets -> launchscreens
You can install iOS App files on devices using Xcode.
<a name="section-5">
###To install an app on a device using Xcode
1. Connect the device to your Mac.
2. In Xcode, choose Window > Devices and select the device under Devices.
3. In the Installed Apps table, click the Add button (+) below the table.
4. In the dialog that appears, choose the iOS App file and click Open.
For more tasks you can perform in the Devices window, read Managing Apps on Devices.
To install the app on an iOS device using iTunes
1. Connect the testing device to a Mac running iTunes.
2. If possible, don’t use a Mac that you use for development. For watchOS apps,
connect an iPhone paired with an Apple Watch.
3. Double-click the iOS App file that you created earlier.
4. In iTunes, click the device in the upper-left corner of the window.
5. Click the Apps button.
6. The app appears in the iTunes Apps list.
7. Under Apps, choose “Sort by Name” or “Sort by Kind” from the pop-up menu.
8. An Install or Remove button appears adjacent to the app.
9. Iif an Install button appears, click it.
10. The button text changes to Will Install.
11. Click the Apply button or the Sync button in the lower-right corner to sync the
device.
12. The app is uploaded to the device so that the user can start testing.
If you are planning to upload the app in the Apple Store, you must generate the archive build.
To do so,


<a name="section-6">
####Archiving Your App</a>

Next, create an archive of your app. Xcode stores this archive in the Archives organizer.
To create an archive
1. In the project navigator, choose a target from the Scheme toolbar menu, and click
Run.Always test the app before you export it.
2. Choose Product > Archive.The Archives organizer appears and displays the new
archive.
To export a development certificate signed app using the team provisioning profile
1. In the Archives organizer, select the archive and click Export.
2. Select “Export a Development-signed Application” and click Next.
3. In the dialog that appears, choose a team from the pop-up menu and click Choose.
4. If necessary, Xcode creates the needed signing identity and provisioning profile for
you.
5. In the dialog that appears, review the app, its entitlements, and the provisioning
profile, and click Export.
6. The team provisioning profile should begin with the text Mac Team Provisioning
Profile:
7. In the dialog that appears, enter a filename and choose a location, and click
Export.

<h2>We Recommend Cloudways Servers for get the best out of the app</h2>
<a href="https://www.cloudways.com/en/laravel-hosting.php?id=315139&amp;a_bid=f2023ff7" target="_top"><img src="https://www.cloudways.com/affiliate/accounts/default1/banners/f2023ff7.jpg" alt="Faster Laravel Hosting" title="Faster Laravel Hosting" width="728" height="90" /></a><img style="border:0" src="https://www.cloudways.com/affiliate/scripts/imp.php?id=315139&amp;a_bid=f2023ff7" width="1" height="1" alt="" />