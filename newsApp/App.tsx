import { StatusBar } from 'expo-status-bar';
import { SafeAreaView, StyleSheet, Text, View } from 'react-native';
import RootNavigator from './src/routes/RootNavigator';

export default function App() {
  return (
    <>
      <RootNavigator></RootNavigator>
      <StatusBar style="auto" />
    </>
  );
}

const styles = StyleSheet.create({

});
