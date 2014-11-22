project(samphp)

cmake_minimum_required(VERSION 2.8)

include(AmxConfig)
include(Plugin)

include_directories(/usr/local/include/php)
include_directories(/usr/local/include/Zend)
include_directories(/usr/local/include/TSRM)
include_directories(/usr/local/include/main)
include_directories(/usr/local/include/php/sapi/embed)
include_directories(./src)
include_directories(./libs/zeex)

if(MSVC)
  add_definitions(-D_CRT_SECURE_NO_WARNINGS)
endif()

add_plugin(samphp
  ./src/*.cpp
  samphp.def
  ./libs/zeex/*.cpp
  ${SDK_INCLUDE_DIR}/amxplugin.cpp
)

target_link_libraries(samphp sampgdk)
target_link_libraries(samphp rt)
target_link_libraries(samphp php5)
target_link_libraries(samphp resolv)
