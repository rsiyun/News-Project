import { StyleSheet, Text, TouchableOpacity, View } from 'react-native';
import Icon from 'react-native-vector-icons/Ionicons'
import {flexBox} from '../style/flex'
import {spacing} from '../style/spacing'
import { useState } from 'react';
export default function BasicToolbar({navigation}:any){
    const [isClicked, setIsClicked] = useState(false);

    const pressIn = () => {
      setIsClicked(true); // Toggle state on click
    };
    const pressOut = () => {
      setIsClicked(false);
      navigation.goBack() // Toggle state on click
    };
    return(
        <View style={[flexBox.dFlex, flexBox.justifyBetween, flexBox.flexDirectionRow, flexBox.itemsCenter, spacing.px16, spacing.py16, flexBox.borderBottom]}>
            <View style={[flexBox.dFlex, flexBox.justifyCenter, flexBox.flexDirectionRow, flexBox.itemsCenter, flexBox.gap4]}>
                <TouchableOpacity style={[isClicked && styles.clickedBackButton]} onPressIn={()=>pressIn()} onPressOut={pressOut}>
                    <Icon name='arrow-back' size={24} color={'#000'}></Icon>
                </TouchableOpacity>
                <Text>Kumparan</Text>
            </View>
            <Icon name='home-outline' size={24} color={'#000'}></Icon>
        </View>
    )
}

const styles = StyleSheet.create({
      clickedBackButton: {
        borderRadius: 50,
        backgroundColor: 'gray', // Ganti dengan warna atau gaya yang diinginkan saat di-klik
      },
      container:{
        
      }
});
