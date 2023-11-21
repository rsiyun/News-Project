import { createNativeStackNavigator } from '@react-navigation/native-stack';
import Home from '../pages/Home/Home';
import Details from '../pages/Home/Details';
import Splash from '../pages/Splash';
import { useLayoutEffect } from 'react';

const Stack = createNativeStackNavigator();

export default function HomeStackNavigator({navigation}:any) {
    // useLayoutEffect(()=>{
    //     navigation.setOptions({
    //         tab
    //       });
    //       console.log(navigation)
    // }, [navigation])
    return(
        <Stack.Navigator initialRouteName='Home' screenOptions={{headerShown: false}}>
            <Stack.Screen name='News' component={Home}/>
            <Stack.Screen name='NDetails' component={Details}/>
        </Stack.Navigator>
    )
}