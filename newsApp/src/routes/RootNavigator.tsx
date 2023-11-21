import { NavigationContainer } from "@react-navigation/native";
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import BottomTabs from "./BottomTabs";
import StackNavigator from "./HomeStack";
import Home from "../pages/Home/Home";
import Splash from "../pages/Splash";
import {
    SafeAreaProvider,
    useSafeAreaInsets,
  } from 'react-native-safe-area-context';
import Details from "../pages/Home/Details";
import BasicToolbar from "../components/BasicToolbar";

const Stack = createNativeStackNavigator();

export default function RootNavigator() {
    return(
        <SafeAreaProvider>
            <NavigationContainer>
                <Stack.Navigator initialRouteName='Splash'>
                    <Stack.Screen name='Splash' options={{headerShown: false}} component={Splash}/>
                    <Stack.Screen name='Tabs' component={BottomTabs}/>
                    <Stack.Screen name='NDetails' options={{title: ""}} component={Details}/>
                </Stack.Navigator>
            </NavigationContainer>
        </SafeAreaProvider>
    )
}