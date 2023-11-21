import { createNativeStackNavigator } from '@react-navigation/native-stack';
import Profile from '../pages/Profile';

const Stack = createNativeStackNavigator();

export default function ProfileStackNavigator() {
    return(
        <Stack.Navigator initialRouteName='Profile' screenOptions={{headerShown: false}}>
            <Stack.Screen name='Profile' component={Profile}/>
        </Stack.Navigator>
    )
}