import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";
import Home from "../pages/Home/Home";
import HomeStackNavigator from "./HomeStack";
import IonIcons from 'react-native-vector-icons/Ionicons';
import ProfileStackNavigator from "./ProfileStack";
import ProfilePage from "../pages/Profile";
const Tab = createBottomTabNavigator();


const homeStack = 'HomeStack';
const profileStack = 'ProfileStack';

const BottomTabs = () => {
    return (
      <Tab.Navigator
        screenOptions={({ route }) => ({
          tabBarIcon: ({ focused, color, size }) => {
            let iconName = "";

            if (route.name == homeStack) {
              iconName = focused ? 'home' : 'home-outline';
            } else if (route.name === profileStack) {
              iconName = focused ? 'person' : 'person-outline';
            }

            // You can return any component that you like here!
            return <IonIcons name={iconName} size={size} color={color} />;
          },
          tabBarActiveTintColor: '#000',
          tabBarInactiveTintColor: '#b0b0b0',
          tabBarShowLabel: false,
          tabBarStyle: {
            height: 60
          }
        })}
      >

        <Tab.Screen name={homeStack} component={Home} options={{title: 'News',headerShown: false}}/>
        <Tab.Screen name={profileStack} options={{ title: 'Profile',headerShown: false}} component={ProfilePage} />
      </Tab.Navigator>
    );
  };
  
  export default BottomTabs;